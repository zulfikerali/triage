import api from './api'
export default {
  episodes () {
    return api.get(`/getEpisodes`)
  },
  activeEpisode () {
    return api.get(`/getActiveEpisode`)
  },
  questions () {
    return api.get(`/getQuestions`)
  },
  selectActiveEpisode (episode) {
    return api.post(`/activeEpisode`, episode)
  },
  storeResult (evaluation) {
    return api.post(`/storeResult`, evaluation)
  },
  getResult (episodeId, traineeId) {
    return api.get(`/getResult/${episodeId}/${traineeId}`)
  },
  storeQuestion (questionData) {
    return api.post(`/storeQuestion`, questionData)
  },
  allColorCode () {
    return api.get(`/allColorCode`)
  },
  getTraineeResults () {
    return api.get(`/getTraineeResults`)
  }
}
