const Home = () => import('../components/pages/Home.vue');
const Questions = () => import('../components/pages/Questions.vue');
const Episodes = () => import('../components/pages/Episodes.vue');
const Introduction = () => import('../components/pages/Intro.vue');
const Result = () => import('../components/pages/Result.vue');
const CreateQuestion = () => import('../components/pages/CreateQuestion.vue');
const TraineeResults = () => import('../components/pages/TraineeResults.vue');
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
        path: '/trainee-results',
        component: TraineeResults,
        name: 'TraineeResults',

    },
    {
        path: '/result-report/:episodeId/:traineeId',
        component: Result,
        name: 'Result',

    },
    {
        path: '/create-question',
        component: CreateQuestion,
        name: 'CreateQuestion',

    },
    // {
    //     path: '/:pathMatch(.*)*',
    //     redirect: '/',

    // }
];
