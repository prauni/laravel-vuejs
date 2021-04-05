const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const CategoryList = () => import('./components/category/List.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const CategoryCreate = () => import('./components/category/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */)
const CategoryEdit = () => import('./components/category/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)

const ProductList = () => import('./components/product/List.vue' /* webpackChunkName: "resource/js/components/product/list" */)
const ProductCreate = () => import('./components/product/Add.vue' /* webpackChunkName: "resource/js/components/product/add" */)
const ProductEdit = () => import('./components/product/Edit.vue' /* webpackChunkName: "resource/js/components/product/edit" */)

const EmployeeList = () => import('./components/employee/List.vue' /* webpackChunkName: "resource/js/components/employee/list" */)
const EmployeeCreate = () => import('./components/employee/Add.vue' /* webpackChunkName: "resource/js/components/employee/add" */)
const EmployeeEdit = () => import('./components/employee/Edit.vue' /* webpackChunkName: "resource/js/components/employee/edit" */)



export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'categoryList',
        path: '/category',
        component: CategoryList
    },
    {
        name: 'categoryEdit',
        path: '/category/:id/edit',
        component: CategoryEdit
    },
    {
        name: 'categoryAdd',
        path: '/category/add',
        component: CategoryCreate
    },
    {
        name: 'productList',
        path: '/product',
        component: ProductList
    },
    {
        name: 'productEdit',
        path: '/product/:id/edit',
        component: ProductEdit
    },
    {
        name: 'productAdd',
        path: '/product/add',
        component: ProductCreate
    },
    {
        name: 'employeeList',
        path: '/employee',
        component: EmployeeList
    },
    {
        name: 'employeeEdit',
        path: '/employee/:id/edit',
        component: EmployeeEdit
    },
    {
        name: 'employeeAdd',
        path: '/employee/add',
        component: EmployeeCreate
    }
]