<template>
    <div class="row">
        <div class="col-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Add Student
                        </h3>
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
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <label> First Name:</label>
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="First Name." v-model="first_name_of_student">
                                            <span class="text-danger" v-if="errors && errors['first_name']">{{ errors['first_name'][0] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <label> Last Name:</label>
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Last Name." v-model="last_name">
                                            <span class="text-danger" v-if="errors && errors['last_name']">{{ errors['last_name'][0] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <label> Address:</label>
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Address" v-model="address">
                                            <span class="text-danger" v-if="errors && errors['address']">{{ errors['address'][0] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <label> Roll No.:</label>
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Roll Number." v-model="roll_number">
                                            <span class="text-danger" v-if="errors && errors['roll_number']">{{ errors['roll_number'][0] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <label> Email:</label>
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Email" v-model="email">
                                            <span class="text-danger" v-if="errors && errors['email']">{{ errors['email'][0] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="col-md-2">State:</div>
                                        <div class="m-inpaut-icon m-input-icon--left">
                                            <select class="orm-control m-input m-input--solid" v-model="state">
                                                <option value="" disabled selected>Select option</option>
                                                <option v-for="item in states" :value="item.id">{{ item.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="col-md-2">Region:</div>
                                        <div class="m-input-icon m-input-icon--left">
                                            <select class="orm-control m-input m-input--solid" v-model="region">
                                                <option value="" disabled selected>Select option</option>
                                                <option v-for="item in regions" :value="item.id">{{ item.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 15px">
                                    <div class="col-md-4">Add Libraries:</div>
                                    <div class="col-md-4" style="margin-right: 400px">
                                        <button type="button" class="btn btn-primary" @click.prevent="addFields">
                                            Add Libraries
                                        </button>
                                    </div>
                                </div>
                                <div class="row" v-for="(item, index) in libraries">
                                    <div class="col-md-4" style="margin-top: 10px">
                                        <input type="text" class="form-control m-input m-input--solid" placeholder="Library name." v-model="item.library_name">
                                        <span class="text-danger" v-if="errors && errors['libraries.'+index+'.library_name']">{{ errors['libraries.'+index+'.library_name'][0] }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <a style="color: #B22222;" @click.prevent="removeField(index)">
                                            <i class="flaticon-cancel" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 15px">
                                    <div class="col-md-4">Add Standards:</div>
                                    <div class="col-md-4" style="margin-right: 400px">
                                        <button type="button"  @click.prevent="addFields">
                                            Add Standards
                                        </button>
                                    </div>
                                </div>
                                <div class="row" v-for="(item, index) in standards">
                                    <div class="col-md-4" style="margin-top: 10px">
                                        <input type="text" class="form-control m-input m-input--solid" placeholder="Standard." v-model="item.standard">
                                        <span class="text-danger" v-if="errors && errors['standards.'+index+'.standard']">{{ errors['libraries.'+index+'.standards'][0] }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <a style="color: #B22222;" @click.prevent="removeField(index)">
                                            <i class="flaticon-cancel" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <br/>
                    <!--begin::Section-->
                    <div class="kt-section">
                        <div class="kt-section__content" v-if="!loading">
                            <button type="button" class="btn btn-primary" @click.prevent="submit">
                                Submit
                            </button>
                            <router-link to="/plugins/Excel/student">
                                <button type="button" class="btn btn-success">
                                    Cancel
                                </button>
                            </router-link>
                        </div>
                        <div class="kt-section__content" v-else>
                            Saving data...
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
    import Multiselect from 'vue-multiselect';
    export default {
        name: "AddStudent",
        data() {
            return {
                first_name_of_student: '',
                last_name: '',
                address: '',
                roll_number: '',
                email:'',
                state:'',
                states:[],
                region:'',
                regions:[],
                libraries: [
                    {
                        library_name: ''
                    }],
                standards:[
                    {
                        standard: ''
                    }],
                loading: false,
                errors: {},

            }
        },
        components: { Multiselect },
        created() {
            axios.get('/nits-plugins-api/Excel/states').then(response => {
                if (response.status === 200) {
                    this.states = response.data.states
                }
            });

            axios.get('/nits-plugins-api/Excel/regions').then(response => {
                if (response.status === 200) {
                    this.regions = response.data.regions
                }
            });

        },
        methods: {
            submit() {
                this.loading = true;
                this.errors = {};
                const postData = {
                    first_name: this.first_name_of_student,
                    last_name: this.last_name,
                    address: this.address,
                    roll_number: this.roll_number,
                    email:this.email,
                    state_id:this.state,
                    region_id:this.region,
                    libraries:this.libraries,
                    standards:this.standards,

                };

                axios.post('/nits-plugins-api/Excel/students', postData).then(response => {
                    if(response.status === 200) {
                        this.$router.push({path: '/plugins/Excel/student'});
                    }
                }).catch((error) => {
                    this.loading = false;
                    this.errors = error.response.data.errors
                })
            },

            addFields() {
                this.libraries.push({library_name: ''})
            },
            removeField(index) {
                this.libraries.splice(index, 1);
            },

            addFields() {
                this.standards.push({standard: ''})
            },
            removeField(index) {
                this.standards.splice(index, 1);
            }


        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>

</style>
