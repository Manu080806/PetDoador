const Pet = require('../models/petModel');

const petController = {
    createPet: (req, res) => {
        const newPet = {
            petname: req.body.petname,
            nomeDono: req.body.nomeDono,
            cpfD: req.body.cpfD,
            telefone: req.body.telefone,
            email: req.body.email,
            raca: req.body.raca,
            peso: req.body.peso,
            idade: req.body.idade,
            foto: req.bodt.foto,
            rua: req.body.rua,
            numero: req.body.numero,
            bairro: req.bodt.bairro,
            cidade: req.body.cidade,
            uf: req.body.uf,
            cep: req.body.cep,
            pais: req.body.pais,
            user: req.body.user,
            password: req.body.password,
        };

        Pet.create(newPet, (err, petId) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.redirect('/pets');
        });
    },

    getPetById: (req, res) => {
        const petId = req.params.id;

        Pet.findById(petId, (err, pet) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            if (!pet) {
                return res.status(404).json({ message: 'Pet not found' });
            }
            res.render('pets/show', { pet });
        });
    },

    getAllPets: (req, res) => {
        Pet.getAll((err, pets) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.render('pets/index', { pets });
        });
    },

    renderCreateForm: (req, res) => {
        res.render('pets/create');
    },

    renderEditForm: (req, res) => {
        const petId = req.params.id;

        Pet.findById(petId, (err, pet) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            if (!pet) {
                return res.status(404).json({ message: 'Pet not found' });
            }
            res.render('pets/edit', { pet });
        });
    },

    updatePet: (req, res) => {
        const petId = req.params.id;
        const updatedPet = {
            petname: req.body.petname,
            nomeDono: req.body.nomeDono,
            cpfD: req.body.cpfD,
            telefone: req.body.telefone,
            email: req.body.email,
            raca: req.body.raca,
            peso: req.body.peso,
            idade: req.body.idade,
            foto: req.bodt.foto,
            rua: req.body.rua,
            numero: req.body.numero,
            bairro: req.bodt.bairro,
            cidade: req.body.cidade,
            uf: req.body.uf,
            cep: req.body.cep,
            pais: req.body.pais,
            user: req.body.user,
            password: req.body.password,
        };

        Pet.update(petId, updatedPet, (err) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.redirect('/pets');
        });
    },

    deletePet: (req, res) => {
        const petId = req.params.id;

        Pet.delete(petId, (err) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.redirect('/pets');
        });
    },
};

module.exports = petController;

