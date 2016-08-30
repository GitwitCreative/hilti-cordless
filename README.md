# HILTI - Microsite Cordless
A HILTI Microsite developed by FORK Unstable Media GmbH. 

## Requirements
- [Node.js](http://nodejs.org/).
- [Grunt](http://gruntjs.com/).
- [Bower](http://bower.io/).

## Folder structure
|-- admin --> *administration area*  
|-- configs --> *configuration files*  
|-- data --> *json based data for every language*  
__|---- at --> *json data for at*  
__|---- au --> *json data for au*  
__|---- ....  
__|---- i18n --> *json meta data for every country/language*  
__|---- ....  
	   
|-- dist --> *destination folder for HTML generation*  
__|---- admin --> *assets for admin*  
__|---- assets --> *assets for microsites*  
__|---- at --> *generated HTML files for at*  
__|---- au --> *generated HTML files for au*  
__|---- ...  
__|---- files --> *individual files uploaded by editors*
__|---- ...  

|-- site --> *HTML/PHP templates as source for generation and preview*  
|-- src --> *assets folder* 

## Quickstart

#### 1. install SASS dependencies

    gem install sass

#### 2. install Node dependencies

    npm install

#### 3. install Bower dependencies

    bower install

#### 4. generate the assets for public sites in the `dist/assets` folder

    grunt build

#### 5. generate the assets for admin in `dist/admin` folder

    grunt admin

#### 6. download the json data from Hilti microsites server and place it into git root directory

#### 7. [for development] generate the JS, CSS and HTML files in the `dist` folder for development

    grunt develop


## Run local environent

### Run admin environment
Start your local server from the git root directory, for example with this command: 

`$ php -S 127.0.0.1:8585 `

### Run a single microsite environment
Start your local server from the `dist/LANG` directory, for example with this command: 

`$ cd dist/ch_de `  
`$ php -S 127.0.0.1:8585 `

**Please note**: the microsites make use of baseHref, so if you work with live data, you will see the assets on local testing requested from live environment!

# Adding a new microsite

To add a new microsite, you have to do the following steps:

  1. add a new user in `admin/users.json`
  2. copy the data from an already existing site (for example `data/de`) and place it into a new data folder, for example `data/de_it`
  3. copy the i18n file from the base language `data/i18n/de.json` into the new language `data/i18n/de_it.json`
  4. adjust the first 3 values of the i18n file (general/lang, general/language_html, general/domain)
  5. create the dist folder for the new site, `dist/de_it/`
  6. be sure, that the external domains on HostEurope are connected and let them point to the dist folder

Now you should be able to login into admin area with the new credentials and generate and deploy the HTML files to the newly created diest folder.


### Frontend - static pages development

fe/README.md (doubled below)

#$ bower install
#$ npm install
#$ gulp serve - development (access with http://[local]host:8082)


work directory app
copy videos to the path app/videos
copy images to the path app/images

app/styles/noprefixed - css files without prefixes

to add prefixes run 
#$ gulp prefix

app/styles/*.css - files with vendor prefixes


to view html-pages work without gulp - copy directory "bower_component" to app.

