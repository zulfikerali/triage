const Home = () => import('../components/pages/Home.vue');
const Questions = () => import('../components/pages/Questions.vue');
const Episodes = () => import('../components/pages/Episodes.vue');
const Introduction = () => import('../components/pages/Intro.vue');
// const Password = () => import('../Views/Password.vue');
// const Login = () => import('../Views/Login.vue');
// const ForgotPassword = () => import('../Views/ForgotPassword.vue');
// const ResetPassword = () => import('../Views/ResetPassword.vue');
// const VerifyEmail = () => import('../Views/VerifyEmail.vue');
// const Register = () => import('../Views/Register.vue');
// const Home = () => import('../Views/Home.vue');
// const Welcome = () => import('../Views/Welcome.vue')

export default [
    {
        path: '/',
        component: Home,
        name: 'Home',

    },
    {
        path: '/questions',
        component: Questions,
        name: 'Questions',

    },
    {
        path: '/admin/episodes',
        component: Episodes,
        name: 'Episodes',

    },
    {
        path: '/introduction',
        component: Introduction,
        name: 'Introduction',

    },
    // {
    //     path: '/home',
    //     component: Home,
    //     name: 'home',
    //     meta: {
    //         guard: 'auth'
    //     }
    // },
    // {
    //     path: '/login',
    //     component: Login,
    //     name: 'login',
    //     meta : {
    //         guard : 'guest'
    //     }
    // },
    // {
    //     path: '/forgot-password',
    //     component: ForgotPassword,
    //     name: 'forgot-password',
    //     meta : {
    //         guard : 'guest'
    //     }
    // },
    // {
    //     path: '/reset-password/:token',
    //     props: route => ({
    //         token: route.params.token,
    //         email: route.query.email
    //     }),
    //     component: ResetPassword,
    //     name: 'reset-password',
    //     meta : {
    //         guard : 'guest'
    //     }
    // },
    // {
    //     path: '/register',
    //     component: Register,
    //     name: 'register',
    //     meta : {
    //         guard : 'guest'
    //     }
    // },
    // {
    //     path: '/verify-email/:id/:hash',
    //     props: route => ({
    //         id: route.params.id,
    //         hash: route.params.hash           
    //     }),
    //     component: VerifyEmail,
    //     name: 'verify-email',

    // },
    // {
    //     path: '/settings',
    //     component: Settings,
    //     redirect: {
    //         name: 'profile'
    //     },
    //     name: 'settings',
    //     meta: {
    //         guard: 'auth'
    //     },
    //     children: [{
    //             path: 'profile',
    //             component: Profile,
    //             name: 'profile',
    //             meta: {
    //                 guard: 'auth'
    //             },

    //         },
    //         {
    //             path: 'password',
    //             component: Password,
    //             name: 'password',
    //             meta: {
    //                 guard: 'auth'
    //             },

    //         },

    //     ]
    // },
    // {
    //     path: '/:pathMatch(.*)*',
    //     redirect: '/',

    // }
];
