const mysql = require('mysql');

connection = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: '',
	database: 'bd_carrera_atanacio_tzul'
});

let userModel = {}; 

userModel.getUsers = (callback) =>{
	if (connection){
		connection.query('SELECT id_corredor,Nombre,Numero from corredor ORDER BY Numero ASC',
			(err, rows) =>{
				if (err) {
					throw err;
				}else{
					callback(null, rows);
				}
			}
		) 
	}
};

module.exports = userModel;