"use strict";
module.exports = function(grunt) {

	grunt.initConfig({
		pkg : grunt.file.readJSON('package.json'),

		/* 	grunt-contrib-clean
			Removes all files from specified directories.
			Used to delete temporary files generated by the previous grunt task
		*/
		clean : {
			clean_css: ['tmp/css'],
			clean_js: ['tmp/js'],
		},

		concat : {
			concat_js : {
				options : {
					separator : ';'
				},
				files : [{
					src		: [
						'bower_components/html5shiv/dist/html5shiv.js',
						'bower_components/jquery/dist/jquery.js',
					],
					dest	: 'tmp/js/global-foot.concat.js',
				}],
			},
		},

		uglify : {
			uglify_concat : {
				options : {
					banner	: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
				},
				files : [{
					expand	: true,
					cwd		: 'tmp/js/',
					src		: ['*.concat.js'],
					dest	: 'dist/assets/js/',
					ext		: '.min.js',
				}],
			},
			uglify_individual : {
				options : {
					banner	: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
				},
				files : [{
					expand	: true,
					cwd		: 'src/assets/js/',
					src		: ['**/*.js'],
					dest	: 'dist/assets/js/',
				}],
			},
		},

		compass : {
			compile_all : {
				options : {
					environment	: 'production',
					outputStyle	: 'expanded', //let cssmin handle minification
					sassDir		: 'src/assets/scss/',
					cssDir		: 'tmp/css/',
					require		: [
						'susy',
						'breakpoint',
					],
				},
			},
		},

		cssmin : {
			minify_all : {
				options : {
					banner : '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd hh:MM:ss") %> */\n'
				},
				files : [{
					expand	: true,
					cwd		: 'tmp/css/',
					src 	: ['*.css'],
					dest 	: 'dist/assets/css/',
					ext 	: '.min.css',
					rename	: function(dest,ext) {
						var fileName = 'global';
						var extension = ext.substring(ext.indexOf('.'), ext.length);
						var fullPath = dest + fileName + extension;
						return fullPath;
					},
				}],
			},
		},

		// Used to copy files directly from one directory to another without processing.
		copy : {
			copy_htdocs : {
				files : [{
					expand	: true,
					cwd		: 'src/',
					src		: ['*.php','*.htm','*.html','*.htaccess'],
					dest	: 'dist/',
					filter	: 'isFile',
				}],
			},
			copy_php : {
				files : [{
					expand	: true,
					cwd		: 'src/php/',
					src		: ['**/*'],
					dest	: 'dist/php/',
					filter	: 'isFile',
				}],
			},
			copy_vendor_css : {
				files : [{
					src		: 'bower_components/normalize.css/normalize.css',
					dest	: 'src/assets/scss/base/_normalize.scss',
				}],
			},
			copy_json : {
				files: [{
					expand 	: true,
					cwd		: 'src/assets/data/',
					src 	: ['**'],
					dest	: 'dist/assets/data/',
					filter  : 'isFile',
				}],
			},
			copy_js : {
				files: [{
					src 	: 'bower_components/livereload/dist/livereload.js',
					dest 	: 'dist/assets/js/vendor/livereload.js'
				}],
			},
			copy_img : {
				files: [{
					expand 	: true,
					cwd		: 'tmp/img/',
					src 	: ['**/*'],
					dest	: 'dist/assets/img/',
				}],
			},
		},


		watch : {
			watch_htdocs : {
				files	: ['src/*.php','src/*.html','src/*.html','src/*.htaccess'],
				tasks 	: ['copy:copy_htdocs'],
			},
			watch_php : {
				files	: ['src/php/**/*.php'],
				tasks 	: ['copy:copy_php'],
			},
			watch_js : {
				files 	: ['src/assets/js/**/*.js'],
				tasks 	: ['concat:concat_js','uglify'],
			},
			watch_css : {
				files	: ['src/assets/css/**/*.css'],
				tasks 	: ['copy:copy_css'],
			},
			watch_scss : {
				files 	: ['src/assets/scss/**/*.{scss,sass}'],
				tasks 	: ['compass'],
			},
			watch_tmp : {
				files	: ['tmp/css/**/*.css'],
				tasks 	: ['cssmin'],
			},
			watch_json : {
				files	: ['src/assets/data/**/*.json'],
				tasks 	: ['copy:copy_json'],
			},
			reload : {
				files	: [
					'dist/**/*.{php,html,htm,css,js,json}',
				],
				options : {
					livereload: true
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default',
		[
			'clean',
			'concat',
			'uglify',
			'compass',
			'copy',
			'cssmin',
		]
	);
};