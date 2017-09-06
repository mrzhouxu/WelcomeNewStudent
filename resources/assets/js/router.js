import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

export default new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            name:"index",
            path:'/',
            component: resolve =>void(require(['./components/Index.vue'], resolve))
        },
        {
            name:"settinginfo",
            path:'/info/set',
            component: resolve =>void(require(['./components/SettingInfo.vue'], resolve))
        },
        {
            name:"info",
            path:'/info',
            component: resolve =>void(require(['./components/Info.vue'], resolve))
        },
        {
            name:"test",
            path:'/test',
            component: resolve =>void(require(['./components/test.vue'], resolve))
        },
    ]
})
