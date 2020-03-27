<template>
    <!-- begin:: Header -->
    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

        <!-- begin:: Title -->
        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper" style="opacity: 1;">
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                <ul class="kt-menu__nav ">
                    <li>
                        <router-link to="/dashboard">
                            <!--                           <img alt="Logo" :src="nitseditor.app_logo" height="40px" />-->
                            <img alt="Logo" src="/logo/BiltraxDIA.png" height="40px" style="margin-top: 15px"/>
                        </router-link>
                    </li>
                    <!--                    <li class="kt-menu__item  kt-menu__item&#45;&#45;open kt-menu__item&#45;&#45;here kt-menu__item&#45;&#45;submenu kt-menu__item&#45;&#45;rel kt-menu__item&#45;&#45;open kt-menu__item&#45;&#45;here kt-menu__item&#45;&#45;active"><h4>Applications</h4></li>-->
                </ul>
            </div>
        </div>
        <!-- end:: Title -->

        <!-- begin:: Header Menu -->
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper" style="width : 100%;">
            <top-bar></top-bar>
        </div>

        <!--        &lt;!&ndash; end:: Header Menu &ndash;&gt;-->

        <!-- begin:: Header Topbar -->
        <div class="kt-header__topbar">

            <!--begin: Notifications -->
            <div class="kt-header__topbar-item dropdown">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <!--                    <span class="kt-header__topbar-icon kt-header__topbar-icon&#45;&#45;success"><i class="flaticon2-bell-alarm-symbol"></i></span>-->
                    <!--                    <span class="kt-hidden kt-badge kt-badge&#45;&#45;danger"></span>-->
                    <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                                <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                            </g>
                        </svg><span class="kt-pulse__ring"></span>
                    </span>
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                    <user-notifications></user-notifications>
                </div>
            </div>
            <!--end: Notifications -->
            <!--begin: Quick actions -->
<!--            <div class="kt-header__topbar-item dropdown">-->
<!--                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">-->
<!--                    &lt;!&ndash;                    <span class="kt-header__topbar-icon kt-header__topbar-icon&#45;&#45;warning"><i class="flaticon2-gear"></i></span>&ndash;&gt;-->
<!--                    <span class="kt-header__topbar-icon">-->
<!--										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
<!--											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
<!--												<rect id="bound" x="0" y="0" width="24" height="24" />-->
<!--												<rect id="Rectangle-62-Copy" fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />-->
<!--												<rect id="Rectangle-62-Copy-2" fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />-->
<!--												<rect id="Rectangle-62-Copy-4" fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />-->
<!--												<rect id="Rectangle-62-Copy-3" fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />-->
<!--											</g>-->
<!--										</svg> </span>-->
<!--                </div>-->
<!--                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">-->
<!--                    <user-quick-actions></user-quick-actions>-->
<!--                </div>-->
<!--            </div>-->

            <!--end: Quick actions -->

            <!--begin: User bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="kt-header__topbar-user">
                        <!--                        <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>-->
                        <!--                        <span class="kt-header__topbar-welcome kt-hidden-mobile">Admin</span>-->
                        <img class="kt-hidden" alt="Pic" src="/nits-assets/media/media/users/300_21.jpg" />
                        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold" style="color: #800020">{{first_name.charAt(0) + ' ' + (last_name ? last_name.charAt(0) : '')}}</span>
                    </div>
                    <!--                    <span class="kt-hidden kt-header__topbar-welcome">Hi,</span>-->
                    <!--                    <span class="kt-hidden kt-header__topbar-username">Nick</span>-->
                    <!--                    <img class="kt-hidden" alt="Pic" src="/nits-assets/media/media/users/300_21.jpg" />-->
                    <!--                    <span class="kt-header__topbar-icon kt-hidden-"><i class="flaticon2-user-outline-symbol"></i></span>-->
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                    <user-details></user-details>
                </div>
            </div>

            <!--end: User bar -->

        </div>

        <!-- end:: Header Topbar -->
    </div>
    <!-- end:: Header -->
</template>

<script>
    import UserNotifications from './UserNotifications';
    import UserQuickActions from "./UserQuickActions";
    import UserDetails from "./UserDetails";
    import TopBar from "./TopBar";
    import {mapState} from "vuex";
    import {decrypt} from "NitsModels/_encrypt";

    export default {
        name: "layout-three-header",
        data() {
            return {
                nitseditor: JSON.parse(nitseditor),
                first_name:'',
                last_name:'',
                role:'',
            }
        },
        components: {
            TopBar,
            UserDetails, UserQuickActions, UserNotifications
        },
        created(){
            const authUser = this.$session.get('authUser');

            this.first_name = decrypt(authUser.first_name)
            this.last_name = decrypt(authUser.last_name ? authUser.last_name : '')
            this.role = decrypt(authUser.role)
        },
        computed: {
            ...mapState({
                user: state => state.user
            })
        }
    }
</script>

<style scoped>
    .kt-header {
        background-color: #ffffff;
        border-bottom: 1px solid #eff0f6;
    }
</style>
