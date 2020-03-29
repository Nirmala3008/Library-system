<template>
    <div class="row">
        <div class="col-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Book Issue Form
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
                                            <label> Student Name:</label>
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Student Name." v-model="student_name">
                                            <span class="text-danger" v-if="errors && errors['student_name']">{{ errors['student_name'][0] }}</span>
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

                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="col-md-3"></div>
                                        <div class="m-input-icon m-input-icon--left">
                                            <multiselect
                                                :multiple="true"
                                                v-model="subjects"
                                                :options="subjectOptions"
                                                track-by="id"
                                                label="name"
                                            ></multiselect>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <label> Book Name:</label>
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Book Name." v-model="book_name">
                                            <span class="text-danger" v-if="errors && errors['book_name']">{{ errors['book_name'][0] }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">

                                            <nits-date-picker
                                                label="Date:"
                                                identity="date"
                                                placeholder="Date"
                                                v-model="issue_date">
                                            </nits-date-picker>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

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
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    export default {
        name: "BookIssueForm",
        data() {
            return {
                student_name: '',
                libraries: [
                    {
                        library_name: ''
                    }],
                standards:[
                    {
                        standard: ''
                    }],
                subjects: [],
                subjectOptions: [],
                book_name:'',
                issue_date:'',

                loading: false,
                errors: {},

            }
        },
        components: { Multiselect },
        created() {
            axios.get('/nits-plugins-api/Excel/subjects').then(response => {
                if(response.status === 200) {
                    this.subjectOptions = response.data.subjects
                }
            })
        },
        methods: {
            submit() {
                this.loading = true;
                this.errors = {};
                const postData = {
                    student_name: this.student_name,
                    libraries:this.libraries,
                    standards:this.standards,
                    subjects: this.subjects,
                    book_name: this.book_name,
                    date: this.issue_date,

                };

                axios.post('/nits-plugins-api/Excel/books', postData).then(response => {
                    if(response.status === 200) {
                        this.$router.push({path: '/plugins/Excel/book'});
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
