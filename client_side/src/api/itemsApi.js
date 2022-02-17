import axios from "axios";

const Items = {
    list: () => {
        return axios.get('http://localhost:8000/api/items');
    },
    add: (newItem) => {
        return axios.post('http://localhost:8000/api/items', newItem);
    },
    showOne: (id) => {
        return axios.get('http://localhost:8000/api/items/' + id);
    },
    edit: (id, data) => {
        return axios.put('http://localhost:8000/api/items/' + id, data);
    },
    delete: (id) => {
        return axios.delete('http://localhost:8000/api/items/' + id);
    },
}

export default Items;
