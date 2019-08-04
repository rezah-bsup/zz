const Home = () => import('./components/includes/Home.vue')
const Users = () => import('./components/users/Index.vue')

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/users',
        name: 'users',
        component: Users
    }
];

export default routes;

