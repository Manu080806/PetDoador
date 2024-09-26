const express = require('express');
const bodyParser = require('body-parser');
const methodOverride = require('method-override');
const expressLayouts = require('express-ejs-layouts');
const indexRoutes = require('./routes/indexRoutes');
const petRoutes = require('./routes/petRoutes');
const vetRoutes = require('./routes/vetRoutes');
const cadastro = require('./routes/cadastro');
const login = require('./routes/login');

const app = express();
const PORT = process.env.PORT || 8080;

app.set('view engine', 'ejs');
app.set('views', __dirname + '/views');
app.use(expressLayouts);

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(methodOverride('_method'));

app.use('/', indexRoutes);
app.use('/pets', petRoutes);
app.use('/vets', vetRoutes);
app.use('/cadastro', cadastro);
app.use('/login', login);

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});

