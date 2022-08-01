const Home = () => import('../components/pages/Home.vue');
const Questions = () => import('../components/pages/Questions.vue');
const Game = () => import('../components/pages/Game.vue');
const Episodes = () => import('../components/pages/Episodes.vue');
const EpisodeQuestions = () => import('../components/pages/EpisodeQuestions.vue');
// const EpisodeQuestion = () => import('../components/pages/EpisodeQuestions.vue');
const Introduction = () => import('../components/pages/Intro.vue');
const Result = () => import('../components/pages/Result.vue');
const CreateQuestion = () => import('../components/pages/CreateQuestion.vue');
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
        path: '/game',
        component: Game,
        name: 'Game',

    },
    {
        path: '/admin/episodes',
        component: Episodes,
        name: 'Episodes',

    },
    {
        path: '/admin/episodes/questions',
        component: EpisodeQuestions,
        name: 'EpisodeQuestions',
    },
    // {
    //     path: '/admin/episode/questions/:questionId',
    //     component: EpisodeQuestion,
    //     name: 'EpisodeQuestion',
    // },
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
