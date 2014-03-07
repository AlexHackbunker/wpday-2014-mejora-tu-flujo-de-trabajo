/* jshint node: true */

module.exports = function(grunt) {
  "use strict";

  // Project configuration.
  grunt.initConfig({

    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/**\n' +
              '* <%= pkg.name %>.js v<%= pkg.version %> by @fobiaxx & @Alex.Hackbunker\n' +
              '* Copyright <%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
              '* <%= _.pluck(pkg.licenses, "url").join(", ") %>\n' +
              '*/\n',
    jqueryCheck: 'if (!jQuery) { throw new Error(\"014Media Theme requires jQuery\") } else { jQuery("html").removeClass("no-js").addClass("js") }\n\n',

	clean: {
      dist: ['css','js/dist']
    },


	jshint: {
      options: {
        jshintrc: 'js/.jshintrc'
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
      src: {
        src: ['js/bootstrap/*.js']
      }
    },

    // Task configuration.
    concat: {
      options: {
        banner: '<%= banner %><%= jqueryCheck %>',
        stripBanners: false
      },
      media: {
		src: [
          'js/bootstrap/transition.js'
          'js/bootstrap/alert.js',
          'js/bootstrap/button.js',
          'js/bootstrap/carousel.js',
          'js/bootstrap/collapse.js',
          ,'js/bootstrap/main.js'
          ,'js/bootstrap/dropdown.js'
          ,'js/bootstrap/lateral.js'
          ,'js/bootstrap/slider.js'
          ,'js/bootstrap/expand.js'
          ,'js/bootstrap/paginate.js'
          ,'js/bootstrap/articlerel.js'
          ,'js/bootstrap/modal.js',
          ,'js/bootstrap/tooltip.js',
          ,'js/bootstrap/popover.js',
          ,'js/bootstrap/scrollspy.js',
          ,'js/bootstrap/tab.js',
          ,'js/bootstrap/affix.js',
          ,'js/bootstrap/viewport_bug.js'
        ],
        dest: 'js/dist/<%= pkg.name %>.js'
      }
    },

    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      media: {
        src: ['<%= concat.media.dest %>'],
        dest: 'js/dist/<%= pkg.name %>.min.js'
      }
    },

    recess: {
      options: {
        compile: true
      },
      media: {
        src: ['less/<%= pkg.name %>.less'],
        dest: 'css/<%= pkg.name %>.css'
      },
      min: {
        options: {
          compress: true
        },
        src: ['less/<%= pkg.name %>.less'],
        dest: 'css/<%= pkg.name %>.min.css'
      }
    },

    watch: {
      recess: {
        files: ['less/*.less','less/<%= pkg.name %>/*.less'],
        tasks: ['recess']
      },
      uglify: {
        files: 'js/bootstrap/*.js',
        tasks: ['jshint','concat','uglify']
      }
    }

  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-recess');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // JS distribution task.
  grunt.registerTask('default', [ 'clean' , 'jshint' , 'concat', 'uglify' , 'recess' ]);

};
