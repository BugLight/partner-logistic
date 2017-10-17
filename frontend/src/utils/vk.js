import Vue from 'vue';

const
    VK_API_URL = 'https://api.vk.com/method';


export default function(api_ver) {
    return {
        version: api_ver,
        call(method_name, params) {
            params['v'] = api_ver;
            let url = [VK_API_URL, method_name].join('/');
            return Vue.http.jsonp(url, {
                params
            }).then(response => {
                return response.json()
            });
        }
    };
}
