const db = require('../config/db');

const Pet = {
    createPet: (pet, callback) => {
        const query = 'INSERT INTO pets (petname, nomeDono, cpfD, telefone, email, raca, peso, idade, foto, rua, numero, bairro, cidade, uf, cep, pais, user, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )';
        db.query(query, [pet.petname, pet.nomeDono, pet.cpfD, pet.telefone, pet.email, pet.raca, pet.peso, pet.idade, pet.foto, pet.rua, pet.numero, pet.bairro, pet.cidade, pet.uf, pet.cep, pet.pais, pet.user, pet.password], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results.insertId);
        });
    },

    findById: (id, callback) => {
        const query = 'SELECT * FROM pets WHERE id = ?';
        db.query(query, [id], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results[0]);
        });
    },

    findByPetname: (petname, callback) => {
        const query = 'SELECT * FROM pets WHERE petname = ?';
        db.query(query, [petname], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results[0]);
        });
    },

    updatePet: (id, pet, callback) => {
        const query = 'UPDATE pets SET petname = ?, nomeDono = ?, cpfD = ?, telefone = ?, email = ?, raca = ?, peso = ?, idade = ?, foto = ?, rua = ?, numero = ?, bairro = ?, cidade = ?, uf = ?, cep = ?, pais = ?, user = ?, password = ?, WHERE id = ?';
        db.query(query, [pet.petname, pet.nomeDono, pet.cpfD, pet.telefone, pet.email, pet.raca, pet.peso, pet.idade, pet.foto, pet.rua, pet.numero, pet.bairro, pet.cidade, pet.uf, pet.cep, pet.pais, pet.user, pet.password], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results);
        });
    },

    deletePet: (id, callback) => {
        const query = 'DELETE FROM pets WHERE id = ?';
        db.query(query, [id], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results);
        });
    },

    getAllPets: (callback) => {
        const query = 'SELECT * FROM pets';
        db.query(query, (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results);
        });
    },
};


module.exports = Pet;

