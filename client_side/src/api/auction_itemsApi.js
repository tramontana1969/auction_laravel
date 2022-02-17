import axios from "axios";

const Auction_Items = {
    list: () => {
        return axios.get('http://localhost:8000/api/prices');
    },
    add: (new_Auction_Item) => {
        return axios.post('http://localhost:8000/api/prices', new_Auction_Item);
    },
    showOne: (id) => {
        return axios.get('http://localhost:8000/api/prices/' + id);
    },
    edit: (id, data) => {
        return axios.put('http://localhost:8000/api/prices/' + id, data);
    },
    delete: (id) => {
        return axios.delete('http://localhost:8000/api/prices/' + id);
    },
}

export default Auction_Items;
