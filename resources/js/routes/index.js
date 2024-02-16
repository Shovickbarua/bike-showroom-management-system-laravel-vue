import { createRouter, createWebHistory } from "vue-router";
import Root from "../routes/Root.vue";
import Home from "../pages/Home.vue";
import Dashboard from "../pages/dashboards/Dashboard.vue";
import Product from "../pages/products/Product.vue";
// import ProductForm from "../pages/products/ProductForm.vue";
import Income from "../pages/incomes/Income.vue";
import IncomeForm from "../pages/incomes/IncomeForm.vue";
import Expense from "../pages/expenses/Expense.vue";
import ExpenseForm from "../pages/expenses/ExpenseForm.vue";
import Bike from "../pages/bikes/Bike.vue";
import BikeForm from "../pages/bikes/BikeForm.vue";
import Category from "../pages/categories/Category.vue";
import CategoryForm from "../pages/categories/CategoryForm.vue";
const routes = [
    {
        path: "/",
        component: Root,
        name: "root",
        children: [
            {
                // UserProfile will be rendered inside User's <router-view>
                // when /user/:id/profile is matched
                path: "/",
                name: "dash",
                component: Dashboard,
            },
            {
                path: "/product",
                component: Product,
            },
            // {
            //     path: "/product/add",
            //     component: ProductForm,
            // },
            // {
            //     path: "/product/edit/:id",
            //     component: ProductForm,
            // },

            {
                path: "/incomes",
                component: Income,
            },
            {
                path: "/incomes/add",
                component: IncomeForm,
            },
            {
                path: "/incomes/edit/:id",
                component: IncomeForm,
            },

            {
                path: "/expense",
                component: Expense,
            },
            {
                path: "/expense/add",
                component: ExpenseForm,
            },
            {
                path: "/expense/edit/:id",
                component: ExpenseForm,
            },

            {
                path: "/bike",
                component: Bike,
            },
            {
                path: "/bike/add",
                component: BikeForm,
            },
            {
                path: "/bike/edit/:id",
                component: BikeForm,
            },

            {
                path: "/categories",
                component: Category,
            },
            {
                path: "/categories/add",
                component: CategoryForm,
            },
            {
                path: "/categories/edit/:id",
                component: CategoryForm,
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
