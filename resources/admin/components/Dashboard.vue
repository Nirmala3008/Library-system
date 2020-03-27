<template>
    <div>
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
            <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body" style="width: 100%;">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

<!--                    &lt;!&ndash; begin:: Subheader &ndash;&gt;-->
<!--                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">-->
<!--                        <div class="kt-subheader__main">-->
<!--                            <h3 class="kt-subheader__title">Dashboard</h3>-->
<!--                            <h4 class="kt-subheader__desc">Latest updates and statistic charts</h4>-->
<!--                        </div>-->
<!--                        <div class="kt-subheader__toolbar">-->
<!--                            <div class="kt-subheader__wrapper">-->
<!--                                <a href="#" class="btn kt-subheader__btn-secondary">-->
<!--                                    Reports-->
<!--                                </a>-->
<!--                                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">-->
<!--                                    <a href="#" class="btn btn-danger kt-subheader__btn-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                        Products-->
<!--                                    </a>-->
<!--                                    <div class="dropdown-menu dropdown-menu-right">-->
<!--                                        <a class="dropdown-item" href="#"><i class="la la-plus"></i> New Product</a>-->
<!--                                        <a class="dropdown-item" href="#"><i class="la la-user"></i> New Order</a>-->
<!--                                        <a class="dropdown-item" href="#"><i class="la la-cloud-download"></i> New Download</a>-->
<!--                                        <div class="dropdown-divider"></div>-->
<!--                                        <a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    &lt;!&ndash; end:: Subheader &ndash;&gt;-->

                    <!-- begin:: Content -->
                    <div class="kt-content kt-grid__item kt-grid__item--fluid">

                        <!--Begin::Dashboard 4-->

<!--                       <super-admin-dashboard v-if="role === 'Super admin'"></super-admin-dashboard>-->
<!--                       <admin-dashboard v-else-if="role === 'Subscriber'"></admin-dashboard>-->

                        <!--End::Dashboard 4-->
                    </div>

                    <!-- end:: Content -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SuperAdminDashboard from './SuperadminDashboard'
    import AdminDashboard from './AdminDashboard'
    import {encrypt, decrypt} from "NitsModels/_encrypt";


    export default {
        name: "dashboard",
        data() {
            return {
                role: ''
            }
        },
        components: {
            SuperAdminDashboard, AdminDashboard
        },
        beforeCreate() {
            console.log('Coming to dashboard page')
        },
        created() {
            const authUser = this.$session.get('authUser');
            this.role = decrypt(authUser.role)
        },
    }
</script>

<style scoped>

</style>
