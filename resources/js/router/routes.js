const Home = () => import('../components/pages/Home.vue');
const Questions = () => import('../components/pages/Questions.vue');
const Episodes = () => import('../components/pages/Episodes.vue');
const Introduction = () => import('../components/pages/Intro.vue');
const Result = () => import('../components/pages/Result.vue');
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
        path: '/start-game',
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
        path: '/',
        component: Introduction,
        name: 'Introduction',

    },
    {
        path: '/result-report/:episodeId/:traineeId',
        component: Result,
        name: 'Result',

    },
    // {
    //     path: '/:pathMatch(.*)*',
    //     redirect: '/',

    // }
];
