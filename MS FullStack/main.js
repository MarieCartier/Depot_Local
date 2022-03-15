const app = Vue.createApp(
    {
        data(){
            return{
                nom: '',
                prenom: '',
                numero: '',
                rue: '',
                codepos: '',
                villes: []
            }
            },
            methods: {
                loadVilles() {
                let villes;
                let codepos = this.codepos;
                if (codepos.length === 5) {
                    axios
                    .get(`https://apicarto.ign.fr/api/codes-postaux/communes/${codepos}`)
                    .then((response) => {
                        villes = response.data;
                        villes = villes.map((item) => item.libelleAcheminement);
                        this.villes = villes;
                    })
                    .catch((err) => {
                        this.villes = [];
                    });
                }
                },
            
            },
    }
)