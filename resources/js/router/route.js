import VueRouter from 'vue-router';


const routes = [
    {
        path: '/',
        component: require('../views/Home').default
    },
    {
        path: '/gift/:id',
        component: require('../views/DetailGift').default
    },
];

export default new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: 'is-active',
    linkExactActiveClass: '',
})