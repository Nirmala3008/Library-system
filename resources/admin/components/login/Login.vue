<template>
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root nits-login" >
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login" >
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

                <!--begin::Aside-->
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside nits-login_aside">

                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            <h3 class="kt-login__title">{{ nitseditor.login_title }}!</h3>
                            <h4 class="kt-login__subtitle">{{ nitseditor.login_subtitle }}</h4>
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            <div class="kt-login__copyright" v-html="nitseditor.copyright"></div>
                            <div class="kt-login__menu">
                                <a href="#" class="kt-link">Privacy</a>
                                <a href="#" class="kt-link">Legal</a>
                                <a href="#" class="kt-link">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--begin::Aside-->

                <!--begin::Content-->
                <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                    <!--begin::Head-->
<!--                    <div class="kt-login__head" v-if="loginIn">-->
<!--                        <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;-->
<!--                        <a href="#" class="kt-link kt-login__signup-link" @click="SignUpShow">Sign Up!</a>-->
<!--                    </div>-->
                    <div class="kt-grid__item" >
                        <a href="#" class="kt-login__logo" >
                            <img src="/nits-assets/images/bg/BiltraxDIA.png" alt="logo here" height="90px" width="360px" style="margin-top: 50px; margin-left: 30%">
                        </a>
                    </div>

                    <!--end::Head-->

                    <!--begin::Body-->
                    <div class="kt-login__body" style="height:460px" v-if="loginIn">

                        <!--begin::Signin-->
                        <div class="kt-login__form" style="margin-bottom: 40px">
                            <div class="kt-login__title" style="margin-bottom: -23px">
                                <h3 style="font-size: 1.75rem">Subscriber Sign In</h3>
                            </div>

                            <!--begin::Form-->
                            <form class="kt-form" action="" novalidate="novalidate" >
                                <div class="form-group">
                                    <input class="form-control" dusk="login-email" v-model="email" type="text" placeholder="Email" name="email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" dusk="login-password" v-model="password" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="form-group" v-if="error">
                                    <span class="text-center text-danger">{{ error }}</span>
                                </div>

                                <!--begin::Action-->
                                <div class="kt-login__actions">

                                        <a href="#" class="kt-link kt-login__link-forgot" @click="forgotPasswordShow">
                                             Forgot Password ?
                                         </a>

                                    <button id="kt_login_signin_submit" dusk="login-submit" class="btn btn-primary btn-elevate kt-login__btn-primary" v-bind:class="{ 'kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light': loading }" @click.prevent="login()">Sign In</button>
                                </div>

                                <!--end::Action-->
                            </form>

                            <!--end::Form-->
                        </div>

                        <!--end::Signin-->
                    </div>
                    <div class="kt-login__body" v-if="forgotPassword">

                        <!--begin::Signin-->
                        <div class="kt-login__form">
                            <div class="kt-login__title">
                                <h3>Enter Email for Password Link</h3>
                            </div>

                            <!--begin::Form-->
                            <form class="kt-form" action="" novalidate="novalidate">
                                <div class="form-group">
                                    <input class="form-control" dusk="login-email" v-model="email" type="text" placeholder="Email" name="email" autocomplete="off">
                                </div>
                                <div class="form-group" v-if="error">
                                    <span class="text-center text-danger">{{ error }}</span>
                                </div>

                                <!--begin::Action-->
                                <div class="kt-login__actions">
                                    <button id="kt_login_back_cancel" class="btn btn-secondary btn-elevate kt-login__btn-secondary"  @click.prevent="BacktoLogin()">Back</button>

                                    <button id="kt_login_signin_submit" dusk="login-submit" class="btn btn-primary btn-elevate kt-login__btn-primary" v-bind:class="{ 'kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light': loading }" @click.prevent="submit()" >Submit</button>
                                </div>

                                <!--end::Action-->
                            </form>

                            <!--end::Form-->
                        </div>

                        <!--end::Signin-->
                    </div>
                    <div class="kt-login__body" v-if="SignUpIn">

                        <!--begin::Signin-->
                        <div class="kt-login__form">
                            <div class="kt-login__title">
                                <h3>Sign Up</h3>
                            </div>

                            <!--begin::Form-->
                            <form class="kt-form" action="" novalidate="novalidate">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Full Name" name="Full Name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Username" name="User Name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="Confirm Password" autocomplete="off">
                                </div>
                                <br/>

                                <div class="form-group">
                                    <label class="kt-checkbox kt-checkbox--brand">
                                        <input type="checkbox"> I agree the <a href="">terms & conditions</a>
                                        <span></span>
                                    </label>
                                </div>

                                <!--begin::Action-->
                                <div class="kt-login__actions">
                                    <a href="#" class="kt-link kt-login__link-forgot">
                                        Forgot Password
                                    </a>
                                    <button id="kt_login_back_cancel" class="btn btn-secondary btn-elevate kt-login__btn-secondary"  @click.prevent="BacktoLogin()">Back</button>
                                    <button id="kt_login_signup_submit" class="btn btn-primary btn-elevate kt-login__btn-primary" v-bind:class="{ 'kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light': loading }" @click.prevent="Register()">Submit</button>
                                </div>

                                <!--end::Action-->
                            </form>

                            <!--end::Form-->
                        </div>

                        <!--end::Signin-->
                    </div>

                </div>

                <!--end::Content-->
            </div>
        </div>
    </div>
    <!-- end:: Page -->
</template>

<script>
    import {login} from 'ProjectComponents/admin/_model'

    export default {
        name: "login-component",
        data() {
            return {
                email: '',
                password: '',
                error: '',
                loading: false,
                loginIn: true,
                SignUpIn: false,
                forgotPassword:false,
                nitseditor: JSON.parse(nitseditor)
            }
        },
        beforeCreate() {
            this.$auth.logout();
        },
        created() {

        },
        methods: {
            login() {
                this.loading = true
                this.error = ""
                const user = {
                    email: this.email,
                    password: this.password
                }

                login(user).then(resolve => {
                    this.loading = false
                    // console.log(resolve.redirect);
                    this.$router.push(resolve.redirect)
                }).catch(error => {
                    this.loading = false
                    this.error = error
                })

            },
            submit() {
                if(this.email.split('@').length === 2) {
                    const payload = {
                        email: this.email,
                    }
                    axios.post('/laravel-api/forget-password', payload).then(response => {
                        if (response.status === 200) {
                            this.error = response.data.data;
                            // console.log(this.result)
                        }
                    }).catch((error) => {
                        if (error.response.status === 422) {

                            this.error = "Please Enter valid Email ID.";
                            // console.log(this.error)
                        }
                    });
                }
                else if(this.email.split('@').length != 2) {
                    this.error = "Email ID in Invalid Format.";
                }
            },
            SignUpShow(){
                this.loginIn = false
                this.SignUpIn = true
            },
            forgotPasswordShow(){
                this.loginIn = false
                this.SignUpIn = false
                // this.forgotPassword = true
                this.$router.push({name: 'ForgotPassword'});
            },

            BacktoLogin(){
                this.loginIn = true
                this.SignUpIn = false

            },

            Register(){

            }
        }
    }
</script>

<style lang="css" scoped>
    @import "./login.css";

    .nits-login_aside {
        background-image: url("bg-7.jpg");
    }
</style>
