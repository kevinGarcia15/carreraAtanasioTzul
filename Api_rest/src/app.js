const express = require('express');
const app = express();

const morgan = require('morgan');
const bodyParser = require('body-Parser');//se utiliza para entender las peticiones post


//Configuraciones, revisa si el servidro tiene un puerto definido
app.set('port',  process.env.PORT || 3000);

//midlewares
app.use(morgan('dev'));
app.use(bodyParser.json());
 
//routes
require('./routes/userRoutes')(app);

//statics files

app.listen(app.get('port'), () => {
	console.log('servidor en puerto 3000');
});

