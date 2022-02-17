import axios from 'axios';

const Customers = {
    list: () => {
        return axios.get('http://localhost:8000/api/customers');
    },
    add: (newCustomer) => {
        return axios.post('http://localhost:8000/api/customers', newCustomer);
    },
    showOne: (id) => {
        return axios.get('http://localhost:8000/api/customers/' + id);
    },
    edit: (id, data) => {
        return axios.put('http://localhost:8000/api/customers/' + id, data);
    },
    delete: (id) => {
        return axios.delete('http://localhost:8000/api/customers/' + id);
    },
}

export default Customers;
