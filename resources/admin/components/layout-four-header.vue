<template>
    <!-- begin:: Header -->
    <div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
        <div class="kt-container">

            <!-- begin:: Brand -->
            <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
                <a class="kt-header__brand-logo" href="index.html">
                    <img alt="Logo" width="150" height="40" src="/logo/BiltraxDIA.png" class="kt-header__brand-logo-default" />
                    <img alt="Logo" width="150" height="40" src="/logo/BiltraxDIA.png" class="kt-header__brand-logo-sticky" />
                </a>
            </div>
            <div>
                <a href="https://in.biltrax.com/bx" target="_blank" style="margin-top: 20px;" type="button" class="btn btn-primary">Subscriber Login</a>
            </div>
            <!-- end:: Brand -->

<!--            &lt;!&ndash; begin: Header Menu &ndash;&gt;-->
<!--            <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>-->
<!--            <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item&#45;&#45;fluid" id="kt_header_menu_wrapper">-->
<!--                <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">-->
<!--                    <base-menu-top-one></base-menu-top-one>-->
<!--                </div>-->
<!--            </div>-->

            <!-- end: Header Menu -->
        </div>
    </div>

    <!-- end:: Header -->
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        name: "layout-four-header",
        data() {
            return {
                userNotifications: '',
                topbar_notifications_notifications: [],
                topbar_notifications_events: [],
                UserQuickActions: '',
                User_Quick_Actions: [],
                profileSection: []
            }
        },
        methods: {
            logout() {
                this.$auth.logout()
                this.$router.push('/');
            }
        },
        computed: {
            ...mapState({
                user: state => state.user
            })
        },
        created() {
            console.info('This is coming from header resources');
        }
    }
</script>

<style scoped>

</style>
