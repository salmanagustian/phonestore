import VueRouter from 'vue-router';


const routes = [
    {
        path: '/',
        component: require('../views/Home').default
    },
    {
        path: '/about',
        component: require('../views/About').default
    },
];

export default new VueRouter({
    // mode: 'history',
    routes,
    linkActiveClass: 'is-active',
    linkExactActiveClass: '',
})