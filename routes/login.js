const express = require('express');
const petController = require ('../controllers/petControllers');
const vetController = require('../controllers/vetControllers');
const router = express.Router();


router.get('/', petController.getAllPets);
router.get('/:id', petController.getPetById);

router.get('/', vetController.getAllVets);
router.get('/:id', vetController.getVetById);

module.exports = router;
