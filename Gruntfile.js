module.exports = function (grunt) {
    'use strict';

    // Force use of Unix newlines
    grunt.util.linefeed = '\n';

    require('load-grunt-tasks')(grunt); // load all tasks
    require('time-grunt')(grunt);

    var jsLibs = [
        'src/assets/components/jquery/dist/jquery.js',
        'src/assets/components/velocity/velocity.js',
        'src/assets/components/velocity/velocity.ui.js',
        'src/assets/components/fullpage.js/vendors/jquery.slimscroll.js',
        'src/assets/js/vendor/jquery.fullPage.js',
        'src/assets/components/gsap/src/uncompressed/TweenMax.js',
        'src/assets/components/gsap/src/uncompressed/plugins/ScrollToPlugin.js',
        'src/assets/components/ScrollMagic/scrollmagic/uncompressed/ScrollMagic.js',
        'src/assets/components/ScrollMagic/scrollmagic/uncompressed/plugins/animation.gsap.js',
        'src/assets/components/ScrollMagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js',
        'src/assets/components/slick.js/slick/slick.js',
        'src/assets/components/object-fit/dist/polyfill.object-fit.js',
        'src/assets/components/raf.js/rAF.js'
    ],

    jsFramework = [
        'src/assets/components/foundation/js/foundation/foundation.js',
        'src/assets/components/foundation/js/foundation/foundation.interchange.js',
        'src/assets/components/foundation/js/foundation/foundation.magellan.js',
    ],

    jsProject = [
        'src/assets/js/plugins.js',
        'src/assets/js/plugins/helper.js',
        'src/assets/js/plugins/layer.js',
        'src/assets/js/plugins/persona.js',
        'src/assets/js/plugins/navigation.js',
        'src/assets/js/plugins/products.js',
        'src/assets/js/plugins/preloader.js',
        'src/assets/js/plugins/sections.js',
        'src/assets/js/plugins/scroll-navigation.js',
        'src/assets/js/plugins/video-scroll.js',
        'src/assets/js/app.js',
        'src/assets/js/_*.js'
    ],

    jsApp = jsLibs.concat(jsFramework, jsProject);

    var admin = {
        js: [
            'node_modules/material-design-lite/dist/material.min.js',
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/dropzone/dist/dropzone.js',
            'node_modules/sweetalert/dist/sweetalert.min.js',
            'node_modules/simditor/node_modules/simple-module/lib/module.js',
            'node_modules/simditor/node_modules/simple-hotkeys/lib/hotkeys.js',
            'node_modules/simditor/node_modules/simple-uploader/lib/uploader.js',
            'node_modules/simditor/lib/simditor.js',
            'admin/assets/scripts.js'
        ],
        css: [
            'node_modules/material-design-lite/dist/material.min.css',
            'node_modules/sweetalert/dist/sweetalert.css',
            'node_modules/simditor/styles/simditor.css',
            'admin/assets/icons.css',
            'admin/assets/styles.css',
        ],
        src: 'admin/assets/',
        dest: 'dist/admin'
    };


    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Options
        config: {
            srcPath:            'src',
            srcAssetsPath:      'src/assets',
            srcComponentsPath:  'src/assets/components',
            distPath:           'dist',
            distAssetsPath:     'dist/assets',
            distAssetsPathDE:     'dist/de/assets',
            distAssetsPathUS:     'dist/us/assets'
        },

        concat: {
            options: {
                separator: ';',
            },
            dist: {
                src: [ jsApp ],
                dest: '<%= config.distAssetsPath %>/js/app.js',
            },

            adminCss: {
                options: {
                    separator: '\n',
                },
                src: admin.css,
                dest: admin.dest + '/app.css'
            },
            adminJs: {
                options: {
                    separator: ';\n',
                },
                src: admin.js,
                dest: admin.dest + '/app.js'
            }
        },


        csslint: {
            options: {
                csslintrc: 'configs/.csslintrc'
            },
            src: [
                '<%= config.distAssetsPath %>/css/app.css',
                '<%= config.distAssetsPath %>/css/ancient-ie.css'
            ]
        },

        jshint: {
            options: {
                jshintrc: 'configs/.jshintrc'
            },
            all: [
                'Gruntfile.js',
                jsProject
            ]
        },

        clean: {
            dist: {
                src: ['<%= config.distAssetsPath %>/*']
            }
        },

        copy: {
            dist: {
                files: [
                    {
                        expand: true,
                        cwd: '<%= config.srcAssetsPath %>',
                        src: ['.htaccess'],
                        dest: '<%= config.distAssetsPath %>/'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.srcPath %>/assets/components/modernizr',
                        src: ['modernizr.js'],
                        dest: '<%= config.distAssetsPath %>/js/vendor'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.srcPath %>/assets/js',
                        src: ['ancient-ie.js'],
                        dest: '<%= config.distAssetsPath %>/js/'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.srcAssetsPath %>/fonts/',
                        src: ['**/*'],
                        dest: '<%= config.distAssetsPath %>/fonts'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.srcAssetsPath %>/icons/',
                        src: ['**/*'],
                        dest: '<%= config.distAssetsPath %>/icons'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.srcAssetsPath %>/content/video',
                        src: ['**/*'],
                        dest: '<%= config.distAssetsPath %>/content/video'
                    }
                ]
            },

            admin: {
                files: [
                    {
                        expand: true,
                        cwd: admin.src,
                        src: ['*.{jpg,png}'],
                        dest: admin.dest
                    }
                ]
            }
        },

        sass: {
            options: {
                // compass: true,
                sourceMap: false,
                trace: true,
                includePaths: [
                    '<%= config.srcComponentsPath %>/foundation/scss'
                ]
            },
            dev: {
                options: {
                    sourceComments: 'normal'
                },
                files: {
                    '<%= config.distAssetsPath %>/css/app.css': '<%= config.srcAssetsPath %>/scss/app.scss',
                    '<%= config.distAssetsPath %>/css/ancient-ie.css': '<%= config.srcAssetsPath %>/scss/ancient-ie.scss'
                }
            }
        },

        cssmin: {
            options: {
                sourceMap: true
            },
            components: {
                files: {
                    // include extern css resources which can't be imported by sass
                    '<%= config.distAssetsPath %>/css/externals.css': [
                        '<%= config.srcComponentsPath %>/fullpage.js/jquery.fullPage.css',
                        '<%= config.srcComponentsPath %>/slick.js/slick/slick.css',
                        '<%= config.srcComponentsPath %>/object-fit/dist/polyfill.object-fit.css'
                    ]
                }
            },
            dist: {
                files: {
                    '<%= config.distAssetsPath %>/css/app.min.css': [
                        '<%= config.distAssetsPath %>/css/externals.css',
                        '<%= config.distAssetsPath %>/css/app.css'
                    ],
                    '<%= config.distAssetsPath %>/css/ancient-ie.min.css': '<%= config.distAssetsPath %>/css/ancient-ie.css'
                }
            }
        },

        uncss: {
            options: {
                report: 'min',
                stylesheets: ['../../<%= config.distAssetsPath %>/css/app.css', '../../<%= config.distAssetsPath %>/css/ancient-ie.css'],
                ignore       : [/\.slick\-[a-z]+/],
                timeout: 1000
            },
            dist: {
                files: {
                    '<%= config.distAssetsPath %>/css/app_stripped.css': ['<%= config.distPath %>/de/index.html']
                }
            }
        },

        uglify: {
            options: {
                sourceMap: true,
                preserveComments: 'some'
            },
            dev: {
                options: {
                    mangle: false,
                    compress: false,
                    sourceMap: false,
                    beautify: true
                },
                files: {
                    '<%= config.distAssetsPath %>/js/app.js': [jsApp]
                }
            },
            prod: {
                options: {
                    mangle: true,
                    compress: true
                },
                files: {
                    '<%= config.distAssetsPath %>/js/app.min.js': [jsApp]
                }
            }
        },

        imagemin: {
            target: {
                files: [{
                    expand: true,
                        cwd: '<%= config.srcAssetsPath %>/layout/',
                        src: ['**/*.{jpg,gif,svg,jpeg,png,ico}'],
                        dest: '<%= config.distAssetsPath %>/layout/'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.srcAssetsPath %>/content/',
                        src: ['**/*.{jpg,gif,svg,jpeg,png,ico}'],
                        dest: '<%= config.distAssetsPath %>/content/'
                    }
                ]
            }
        },

        watch: {
            grunt: {
                files: ['Gruntfile.js']
            },

            sass: {
                files: [
                    '<%= config.srcAssetsPath %>/scss/**/*.scss'
                ],
                tasks: [
                    'sass:dev',
                    'cssmin:dist'
                ]
            },

            js: {
                files: [
                    'Gruntfile.js',
                ].concat( jsApp ),
                tasks: [
                    'uglify',
                    'jshint'
                ]
            },

            images: {
                files: [
                    '<%= config.srcAssetsPath %>/layout/**/*',
                    '<%= config.srcAssetsPath %>/content/img/**/*'
                ],
                tasks: ['newer:imagemin']
            },

            assets: {
                files: [
                    '<%= config.srcAssetsPath %>/fonts/**/*'
                ],
                tasks: ['copy']
            },

            livereload: {
                options: {
                    livereload: true
                },
                files: [
                    '<%= config.distAssetsPath %>/js/app.min.js',
                    '<%= config.distAssetsPath %>/css/app.min.css',
                    '<%= config.distAssetsPath %>/css/app.css',
                    '*.php'
                ]
            },

            adminJs: {
                files: admin.js,
                tasks: ['concat:adminJs']
            },
            adminCss: {
                files: admin.css,
                tasks: ['concat:adminCss']
            },
        },

        environments: {
            options: {
                local_path: 'dist',
                current_symlink: 'current',
                deploy_path: '',
            },
            staging: {
                options: {
                    host: '',
                    username: '',
                    port: '22',
                    privateKey: grunt.file.read(process.env.HOME + '/.ssh/id_rsa'),
                    debug: true,
                    releases_to_keep: '3',
                    before_deploy: '',
                    after_deploy: ''
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-ssh-deploy');

    grunt.registerTask('build', [
        'clean:dist',
        'copy:dist',
        //'csslint',
        'sass',
        'cssmin:components',
        'cssmin:dist',
        'jshint',
        'uglify',
        'newer:imagemin:target'
    ]);

    grunt.registerTask('buildfast', [
        //'csslint',
        'sass',
        'cssmin:components',
        'cssmin:dist',
        'jshint',
        'uglify',
        //'newer:imagemin:target'
    ]);

    grunt.registerTask('develop', [
        'buildfast',
        // 'concat',
        'watch'
    ]);

    grunt.registerTask('admin', [
        'concat:adminJs',
        'concat:adminCss',
        'copy:admin',
    ]);
}
