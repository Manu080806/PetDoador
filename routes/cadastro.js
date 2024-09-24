const express = require('express');
const petController = require('../controllers/petController');
const vetController = require('../controllers/vetController');
const router = express.Router();

router.get('/', petController.getAllPets);
router.get('/new', petController.renderCreateForm);
router.post('/', petController.createPet);
router.get('/:id', petController.getPetById);
router.put('/:id', petController.updatePet);

router.get('/', vetController.getAllVets);
router.get('/new', vetController.renderCreateForm);
router.post('/', vetController.createVet);
router.get('/:id', vetController.getVetById);
router.put('/:id', vetController.updateVet);

module.exports = router;
