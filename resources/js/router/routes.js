const Home = () => import('../components/pages/Home.vue');
const Questions = () => import('../components/pages/Questions.vue');
const Game = () => import('../components/pages/Game.vue');
const Episodes = () => import('../components/pages/Admin/pages/Episodes.vue');
const GameEpisodes = () => import('../components/pages/Episodes.vue');
const EpisodeQuestions = () => import('../components/pages/EpisodeQuestions.vue');
// const EpisodeQuestion = () => import('../components/pages/EpisodeQuestions.vue');
const Introduction = () => import('../components/pages/Intro.vue');
const Result = () => import('../components/pages/Admin/pages/Report.vue');
const CreateQuestion = () => import('../components/pages/Admin/pages/CreateQuestion.vue');
const QuestionList = () => import('../components/pages/Admin/pages/QuestionList.vue');
const TraineeResults = () => import('../components/pages/TraineeResults.vue');
const VictimQuestion = () => import('../components/pages/VictimQuestion.vue');
const ResultEpisodes = () => import('../components/pages/Admin/pages/Results.vue');
const TraineeResultEpisodes = () => import('../components/pages/Admin/pages/TraineeResult.vue');
const Login = () => import('../components/pages/Login.vue');
const Registration = () => import('../components/pages/Registration.vue');
const Dashboard = () => import('../components/pages/Admin/pages/Dashboard.vue');
const Profile = () => import('../components/pages/Admin/pages/Profile.vue');
export default [
    {
        path: '/profile',
        component: Profile,
        name: 'Profile',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'Dashboard',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/start-game',
        component: Home,
        name: 'Home',
        // meta: {
        //     guard: 'guest'
        // }

    },
    {
        path: '/questions',
        component: Questions,
        name: 'Questions',
        // meta: {
        //     guard: 'guest'
        // }

    },
    {
        path: '/game',
        component: Game,
        name: 'Game',
        meta: {
            guard: 'guest'
        }

    },
    {
        path: '/episodes',
        component: Episodes,
        name: 'Episodes',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/game-episodes',
        component: GameEpisodes,
        name: 'GameEpisodes',
    },
    {
        path: '/result/episodes',
        component: ResultEpisodes,
        name: 'ResultEpisodes',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/result-report/:episode_id',
        component: TraineeResultEpisodes,
        name: 'TraineeResultEpisodes',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/admin/episodes/questions',
        component: EpisodeQuestions,
        name: 'EpisodeQuestions',
        meta: {
            guard: 'auth'
        }
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
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/result-report/:episodeId/:traineeId',
        component: Result,
        name: 'Result',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/create-question',
        component: CreateQuestion,
        name: 'CreateQuestion',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/question-list',
        component: QuestionList,
        name: 'QuestionList',
        meta: {
            guard: 'auth'
        }

    },
    {
        path: '/create-victim-question',
        component: VictimQuestion,
        name: 'VictimQuestion',

    },
    {
        path: '/login',
        component: Login,
        name: 'Login',
    },
    {
        path: '/registration',
        component: Registration,
        name: 'Registration',
    },
    // {
    //     path: '/:pathMatch(.*)*',
    //     redirect: '/',

    // }
];
