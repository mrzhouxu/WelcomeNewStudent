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
            path:'/info/set/:id',
            component: resolve =>void(require(['./components/SettingInfo.vue'], resolve))
        },
        {
            name:"info",
            path:'/info/:id',
            component: resolve =>void(require(['./components/Info.vue'], resolve))
        },
         {
            name:"map",
            path:'/map',
            component: resolve =>void(require(['./components/Map.vue'], resolve))
        },
        {
            name:"test",
            path:'/test',
            component: resolve =>void(require(['./components/test.vue'], resolve))
        },
        {
            name:"count",
            path:'/admin/count',
            component: resolve =>void(require(['./admin/Count.vue'], resolve))
        },
        {
            name:"adminlogin",
                path:'/admin/login',
            component: resolve =>void(require(['./admin/Login.vue'], resolve))
        },
        {
            name:"numcount",
                path:'/admin/numcount',
            component: resolve =>void(require(['./admin/NumCount.vue'], resolve))
        },
    ]
})
