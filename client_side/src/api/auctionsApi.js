import axios from "axios";

const Auctions = {
    list: () => {
        return axios.get('http://localhost:8000/api/auctions');
    },
    add: (newAuction) => {
        return axios.post('http://localhost:8000/api/auctions', newAuction);
    },
    showOne: (id) => {
        return axios.get('http://localhost:8000/api/auctions/' + id);
    },
    edit: (id, data) => {
        return axios.put('http://localhost:8000/api/auctions/' + id, data);
    },
    delete: (id) => {
        return axios.delete('http://localhost:8000/api/auctions/' + id);
    },
};

export default Auctions;
