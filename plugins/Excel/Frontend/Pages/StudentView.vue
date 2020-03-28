<template>
    <div class="row">
        <div class="col-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Student
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-actions">
                            <router-link to="/plugins/Excel/add-student">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_stream_modal" >
                                    Add New
                                </button>
                            </router-link>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-12 order-2 order-xl-1">
                                <div class="row">
                                    <div class="col-md-12">
                                    </div>
                                </div><br/>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-12">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." v-model="search">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
										<span>
											<i class="la la-search"></i>
										</span>
									 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--begin::Section-->
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Roll No.</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>Region</th>
                                    <th>Library</th>
                                    <th>Standard</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,index) in students">
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{item.first_name}}</td>
                                    <td>{{item.last_name}}</td>
                                    <td>{{item.roll_number}}</td>
                                    <td>{{item.email}}</td>
                                    <td>{{ item.state }}</td>
                                    <td>{{ item.region }}</td>
                                    <td>{{ item.library_name }}</td>
                                    <td>{{ item.standard }}</td>
                                    <td>
                                        <router-link style="color: #FF9900;" :to="'/plugins/Excel/edit-student/'+item.id">
                                            <i class="flaticon-edit" aria-hidden="true"></i>
                                        </router-link>
                                    </td>
                                    <td>
                                        <a @click.prevent="deleteData(item.id)" style="color: #B22222;">
                                            <i class="flaticon-cancel" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Form-->
            </div>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2'
    export default {
        name: "StudentView",
        data() {
            return {
                search: '',
                students: []
            }
        },
        methods: {
            fetchData() {
                axios.get('/nits-plugins-api/Excel/students?search='+this.search).then(response => {
                    if(response.status === 200) {
                        this.students = response.data.data;
                    }
                })
                console.log(this.students);
            },
            deleteData(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/nits-plugins-api/Excel/students/'+id).then(response => {
                            if(response.status === 200) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success'
                                )
                                this.fetchData();
                            }
                        })
                    }
                })
            }
        },
        watch: {
            search: {
                handler: 'fetchData',
                immediate: true
            }
        }
    }
</script>

<style scoped>

</style>
