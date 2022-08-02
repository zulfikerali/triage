const Home = () => import('../components/pages/Home.vue');
const Questions = () => import('../components/pages/Questions.vue');
const Game = () => import('../components/pages/Game.vue');
const Episodes = () => import('../components/pages/Episodes.vue');
const EpisodeQuestions = () => import('../components/pages/EpisodeQuestions.vue');
// const EpisodeQuestion = () => import('../components/pages/EpisodeQuestions.vue');
const Introduction = () => import('../components/pages/Intro.vue');
const Result = () => import('../components/pages/Result.vue');
const CreateQuestion = () => import('../components/pages/CreateQuestion.vue');
const TraineeResults = () => import('../components/pages/TraineeResults.vue');
const VictimQuestion = () => import('../components/pages/VictimQuestion.vue');
const ResultEpisodes = () => import('../components/pages/ResultEpisodes.vue');
const TraineeResultEpisodes = () => import('../components/pages/TraineeResultEpisodes.vue');
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
        path: '/result/episodes',
        component: ResultEpisodes,
        name: 'ResultEpisodes',

    },
    {
        path: '/result-report/:episode_id',
        component: TraineeResultEpisodes,
        name: 'TraineeResultEpisodes',

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
    {
        path: '/create-victim-question',
        component: VictimQuestion,
        name: 'VictimQuestion',

    },
    // {
    //     path: '/:pathMatch(.*)*',
    //     redirect: '/',

    // }
];
