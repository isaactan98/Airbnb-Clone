export const state = () => ({
    user: []
})

export const mutations = {
    add(state, data) {
        state.user.push({
            data
        })
    },
    remove(state, { user }) {
        state.user.splice(state.user.indexOf(user), 1)
    },

}