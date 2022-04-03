import Products from './components/Product/Products';
import Product from './components/Product/Product';
import ProductAdd from './components/Product/ProductAdd';
import Customers from './components/Customer/Customers';
import Customer from './components/Customer/Customer';
import CustomerAdd from './components/Customer/CustomerAdd'
import Sales from './components/Sale/Sales';
import Sale from './components/Sale/Sale';
import SaleAdd from './components/Sale/SaleAdd';

export const routes = [
    {
        name : 'home',
        path : '/home',
        component : Products
    },
    {
        name : 'product_add',
        path : '/home/items/create',
        component : ProductAdd
    },
    {
        name : 'product',
        path : '/home/items/:id',
        component : Product
    },
    {
        name : 'customers',
        path : '/home/customers',
        component : Customers
    },
    {
        name : 'customer_add',
        path : '/home/customers/create',
        component : CustomerAdd
    },
    {
        name : 'customer',
        path : '/home/customers/:id',
        component : Customer
    },
    {
        name : 'sales',
        path : '/home/sales',
        component : Sales
    },
    {
        name : 'sale_add',
        path : '/home/sales/create',
        component : SaleAdd
    },
    {
        name : 'sale',
        path : '/sales/:id',
        component : Sale
    }
];