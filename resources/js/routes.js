const Home = () => import('./components/includes/Home.vue')
const Users = () => import('./components/users/Index.vue')
const CreateUser = () => import('./components/users/AddOrEdit.vue')
const ShowUser = () => import('./components/users/Show.vue')

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/users',
        name: 'users',
        component: Users,
    },
    {
        name: 'create_user',
        path: '/users/create',
        component: CreateUser
    },
    {
        name: 'edit_user',
        path: '/users/edit/:id',
        component: CreateUser
    },
    {
        name: 'user-info',
        path: '/user/:id',
        component: ShowUser
    }
];

export default routes;

