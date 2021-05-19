<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Proviamo le Api</h1>

    <div id="app">
        <ul>
            <li v-for='item in films'>
                <p>@{{item.name}}</p>
            </li>
        </ul>
    </div>

    <!-- axios_cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script>
        var app = new Vue({

            el:'#app',

            data:{
                films:[]
            },

            mounted:function(){
                axios.get('/laravel-model-controller/public/api/movies')
                .then((response) => {
                    // console.log(response.data);
                    this.films = response.data;
                })
            }
        })
    </script>

</body>
</html>