import _ from 'lodash';

export const menu = function (currentNav) {
    var menu_type = _.find(JSON.parse(nitseditor).all_menu, (o) => {
        return o.link === currentNav;
    })
    if(typeof menu_type === 'undefined' || menu_type.menu_location === 'main_menu')
        var main_menu = _.filter(JSON.parse(nitseditor).menu, function(o) { return o.menu_location === 'main_menu'; });
    else if(menu_type.menu_location === 'analytics_menu')
        var main_menu = _.filter(JSON.parse(nitseditor).menu, function(o) { return o.menu_location === 'analytics_menu'; });

    var menu = main_menu.map(a => ({
        name: a.name,
        link: a.link,
        icon: a.icon,
        permission: _.snakeCase(a.name.replace(/\s/g, '')),
        sub_menu: a.children.length ? a.children.map(b => ({
            name: b.name,
            link: b.link,
            icon: b.icon,
            permission: _.snakeCase(b.name.replace(/\s/g, '')),
            sub_menu: b.children.length ? b.children.map(c => ({
                name: c.name,
                link: c.link,
                icon: c.icon,
                permission: _.snakeCase(c.name.replace(/\s/g, '')),
    })) : []
        })) : []
    }))


    if( typeof menu_type === 'undefined' || menu_type.menu_location === 'main_menu')
        menu.push({name: 'Biltrax Analytics', link: '/dashboard-biltrax-analytics', icon: 'flaticon2-protection'});
    else if(menu_type.menu_location === 'analytics_menu')
        menu.push({name: 'Search Data', link: '/dashboard', icon: 'flaticon2-protection'});

    return menu;
}

import {encrypt} from "NitsModels/_encrypt";
import {getHeader} from "NitsModels/_config";
import store from "NitsModels/../store/_store";
import ability from "NitsModels/_ability";
import VueSession from 'NitsModels/_session';

const session = new VueSession(process.env.MIX_STORAGE_PERSIST, process.env.MIX_INACTIVITY_SESSION);
// session.start();

export const login = function(user) {
    return new Promise((resolve, reject) => {

        const authUser = {};

        const postData = {
            grant_type: 'password',
            username: user.email,
            password: user.password,
            client_id: process.env.MIX_CLIENT_ID,
            client_secret: process.env.MIX_CLIENT_SECRET,
            scope: ''
        };

        axios.post('/oauth/token', postData).then(response => {
            if (response.status === 200) {
                authUser.access_token = encrypt(response.data.access_token);
                authUser.refesh_token = encrypt(response.data.refresh_token);
                session.set('authUser', authUser);
                // window.localStorage.setItem('authUser', JSON.stringify(authUser));

                axios.get('/nits-system-api/user', {headers: getHeader()}).then(response => {
                    if(response.status === 200)
                    {
                        authUser.first_name = encrypt(response.data.data.first_name);
                        authUser.last_name = encrypt(response.data.data.last_name);
                        authUser.email = encrypt(response.data.data.email);
                        authUser.role = encrypt(response.data.data.role);
                        if(response.data.data.role === 'Super admin')
                        {
                            //Storing permissions into localstorage
                            ability.update(response.data.data.permissions);

                            //Storing into local storage.
                            session.set('authUser', authUser);
                            // window.localStorage.setItem('authUser', JSON.stringify(authUser));
                            //Storing to state.
                            store.commit("STORE_USER_DATA", authUser);

                            const redirect = {
                                redirect: '/dashboard'
                            }
                            resolve(redirect);
                        }
                        else {
                            if(response.data.data.role === 'Subscriber') {
                                session.set('authUser', authUser);
                                axios.get('/laravel-api/permissions', {headers: getHeader()}).then(response => {
                                    if(response.status === 200)
                                    {
                                        console.log(response.data);
                                        const redirect = {
                                            redirect: '/dashboard'
                                        };
                                        resolve(redirect);
                                    }
                                });
                            }
                            else {
                                const error = 'Login not allowed';
                                reject(error);
                            }
                        }


                    }
                }).catch((err) => {
                    if(err.response.status === 401){
                        const error = err.response.data.message;
                        reject(error);
                    }
                    if(err.response.status === 500) {
                        const error = 'Server error, please try after sometime.';
                        reject(error);
                    }
                    if(err.response.status === 400) {
                        const error = 'Environment variable missing. Check and retry.';
                        reject(error);
                    }
                })
            }
        }).catch((err) => {
            if(err.response.status === 401){
                const error = err.response.data.message;
                reject(error);
            }
            if(err.response.status === 500) {
                const error = 'Server error, please try after sometime.';
                reject(error);
            }
            if(err.response.status === 400) {
                const error = 'Environment variable missing. Check and retry.';
                reject(error);
            }
        })

    })


}
