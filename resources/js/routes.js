import Products from './components/Product/Products';
import Product from './components/Product/Product';

export const routes = [
    {
        name : 'home',
        path : '/home',
        component : Products
    },
    {
        name : 'product',
        path : '/items/:id',
        component : Product
    },
    {
        name : 'customers',
        path : '/customers',
        component : Product
    },
    {
        name : 'sales',
        path : '/items',
        component : Product
    },

];