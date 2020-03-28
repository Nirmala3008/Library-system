import Vue from 'vue';

export default [
    {
        name: 'home',
        path: '',
        component: Vue.component('Excel-home', () => import('./Pages/Home.vue')),
    },

    {
        name: 'students',
        path: 'student',
        component: Vue.component('Excel-students', () => import('./Pages/StudentView.vue')),
    },

    {
        name: 'add-student',
        path: 'add-student',
        component: Vue.component('Excel-students', () => import('./Pages/AddStudent.vue')),
    },
    // {
    //     name: 'edit-student',
    //     path: 'edit-student/:id',
    //     component: Vue.component('Excel-students', () => import('./Pages/EditStudent.vue')),
    // },

];
