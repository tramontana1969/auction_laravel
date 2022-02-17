import axios from 'axios';
const Sellers = {

    list: () => {
        return axios.get('http://localhost:8000/api/sellers');
    },
    add: (newSeller) => {
        return axios.post('http://localhost:8000/api/sellers', newSeller);
    },
    showOne: (id) => {
        return axios.get('http://localhost:8000/api/sellers/' + id);
    },
    edit: (id, data) => {
        return axios.put('http://localhost:8000/api/sellers/' + id, data);
    },
    delete: (id) => {
        return axios.delete('http://localhost:8000/api/sellers/' + id);
    }
}

export default Sellers;
