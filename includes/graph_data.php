<script src="piechart/d3.min.js"></script>
<script src="piechart/d3pie.js"></script>
<!-- School Graph -->
<script>
	var pie = new d3pie("school_pie", {
		header: {
			  title: {
				text:     "",
				color:    "#333333",
				fontSize: 18,
				font:     "arial"
			  },
			  subtitle: {
				text:     "",
				color:    "#666666",
				fontSize: 14,
				font:     "arial"
			  },
			  location: "top-center",
			  titleSubtitlePadding: 8
		},

		footer: {
			  text:     "School Wise",
			  color:    "#000",
			  fontSize: 25,
			  font:     "arial",
			  location: "bottom-center"
		},

		size: {
			  canvasHeight: 500,
			  canvasWidth: 550,
			  pieInnerRadius: "0%",
			  pieOuterRadius: null
		},

		data: {
			smallSegmentGrouping: {
			enabled: true,
			value: "Other",
			valueType: "percentage",
			label: "Other",
			color: "#cccccc"
		  },

			content: [
				<?php
						echo $school_data;
				?>
			]
		},
    tooltips: {
      enabled: true,
      type: "placeholder",
      string: "{label}: {percentage}%",
      styles: {
        fadeInSpeed: 500,
        backgroundColor: "#00cc99",
        backgroundOpacity: 0.8,
        color: "#ffffcc",
        borderRadius: 4,
        font: "verdana",
        fontSize: 6,
        padding: 10
      }
    },
	labels: {
		  outer: {
			format: "label",
			hideWhenLessThanPercentage: null,
			pieDistance: 30
		  },
		  inner: {
			format: "percentage",
			hideWhenLessThanPercentage: null
		  },
		  mainLabel: {
			color: "#000",
			font: "arial",
			fontSize: 14
		  },
		  percentage: {
			color: "#dddddd",
			font: "arial",
			fontSize: 13,
			decimalPlaces: 0
		  },
		  value: {
			color: "#cccc44",
			font: "arial",
			fontSize: 18
		  },
		  lines: {
			enabled: true,
			style: "curved",
			color: "segment"
		  },
		  truncation: {
			enabled: false,
			length: 30
		  }
	},

	misc: {
  colors: {
    background: null,
		segments: [
		  "#c9233e", "#50f300","#7077bf", "#c246b2",  "#ff8a00", "#16d1f3", "#987ac6", "#3d3b87", "#b77b1c", "#c9c2b6",
		  "#807ece", "#8db27c", "#be66a2", "#9ed3c6", "#00644b", "#005064", "#77979f", "#77e079", "#9c73ab", "#1f79a7","#2484c1", "#65a620", "#7b6888", "#a05d56", "#961a1a", "#d8d23a", "#e98125", "#d0743c", "#635222", "#6ada6a",
		  "#0c6197", "#7d9058", "#207f33", "#44b9b0", "#bca44a", "#e4a14b", "#a3acb2", "#8cc3e9", "#69a6f9", "#5b388f"
		  
		],
		segmentStroke: "#ffffff"
	  },
	  gradient: {
		enabled: true,
		percentage: 95,
		color: "#000000"
	  },
	  canvasPadding: {
		top: 5,
		right: 5,
		bottom: 5,
		left: 5
	  },
	  pieCenterOffset: {
		x: 0,
		y: 0
	  },
	  cssPrefix: null
},
});
</script>

<!-- Subject Graph -->
<script>
	var pie = new d3pie("subject_pie", {
		header: {
			  title: {
				text:     "",
				color:    "#333333",
				fontSize: 18,
				font:     "arial"
			  },
			  subtitle: {
				text:     "",
				color:    "#666666",
				fontSize: 14,
				font:     "arial"
			  },
			  location: "top-center",
			  titleSubtitlePadding: 8
		},

		footer: {
			  text:     "Subject Wise",
			  color:    "#000",
			  fontSize: 25,
			  font:     "arial",
			  location: "bottom-center"
		},

		size: {
			  canvasHeight: 500,
			  canvasWidth: 550,
			  pieInnerRadius: "0%",
			  pieOuterRadius: null
		},

		data: {
			smallSegmentGrouping: {
			enabled: true,
			value: "Other",
			valueType: "percentage",
			label: "Other",
			color: "#cccccc"
		  },

			content: [
				<?php
						echo $subject_data;
				?>
			]
		},
    tooltips: {
      enabled: true,
      type: "placeholder",
      string: "{label}: {percentage}%",
      styles: {
        fadeInSpeed: 500,
        backgroundColor: "#00cc99",
        backgroundOpacity: 0.8,
        color: "#ffffcc",
        borderRadius: 4,
        font: "verdana",
        fontSize: 6,
        padding: 10
      }
    },
	labels: {
		  outer: {
			format: "label",
			hideWhenLessThanPercentage: null,
			pieDistance: 30
		  },
		  inner: {
			format: "percentage",
			hideWhenLessThanPercentage: null
		  },
		  mainLabel: {
			color: "#000",
			font: "arial",
			fontSize: 14
		  },
		  percentage: {
			color: "#dddddd",
			font: "arial",
			fontSize: 13,
			decimalPlaces: 0
		  },
		  value: {
			color: "#cccc44",
			font: "arial",
			fontSize: 18
		  },
		  lines: {
			enabled: true,
			style: "curved",
			color: "segment"
		  },
		  truncation: {
			enabled: false,
			length: 30
		  }
	},

	misc: {
  colors: {
    background: null,
		segments: [
		  "#c9233e", "#50f300","#7077bf", "#c246b2",  "#ff8a00", "#16d1f3", "#987ac6", "#3d3b87", "#b77b1c", "#c9c2b6",
		  "#807ece", "#8db27c", "#be66a2", "#9ed3c6", "#00644b", "#005064", "#77979f", "#77e079", "#9c73ab", "#1f79a7","#2484c1", "#65a620", "#7b6888", "#a05d56", "#961a1a", "#d8d23a", "#e98125", "#d0743c", "#635222", "#6ada6a",
		  "#0c6197", "#7d9058", "#207f33", "#44b9b0", "#bca44a", "#e4a14b", "#a3acb2", "#8cc3e9", "#69a6f9", "#5b388f"
		  
		],
		segmentStroke: "#ffffff"
	  },
	  gradient: {
		enabled: true,
		percentage: 95,
		color: "#000000"
	  },
	  canvasPadding: {
		top: 5,
		right: 5,
		bottom: 5,
		left: 5
	  },
	  pieCenterOffset: {
		x: 0,
		y: 0
	  },
	  cssPrefix: null
},
});
</script>

<!-- Publisher Graph -->
<script>
	var pie = new d3pie("publisher_pie", {
		header: {
			  title: {
				text:     "",
				color:    "#333333",
				fontSize: 18,
				font:     "arial"
			  },
			  subtitle: {
				text:     "",
				color:    "#666666",
				fontSize: 14,
				font:     "arial"
			  },
			  location: "top-center",
			  titleSubtitlePadding: 8
		},

		footer: {
			  text:     "Publisher Wise Books (Top 10)",
			  color:    "#000",
			  fontSize: 25,
			  font:     "arial",
			  location: "bottom-center"
		},

		size: {
			  canvasHeight: 500,
			  canvasWidth: 550,
			  pieInnerRadius: "0%",
			  pieOuterRadius: null
		},

		data: {
			smallSegmentGrouping: {
			enabled: true,
			value: "Other",
			valueType: "percentage",
			label: "Other",
			color: "#cccccc"
		  },

			content: [
				<?php
						echo $publisher_data;
				?>
			]
		},
    tooltips: {
      enabled: true,
      type: "placeholder",
      string: "{label}: {percentage}%",
      styles: {
        fadeInSpeed: 500,
        backgroundColor: "#00cc99",
        backgroundOpacity: 0.8,
        color: "#ffffcc",
        borderRadius: 4,
        font: "verdana",
        fontSize: 6,
        padding: 10
      }
    },
	labels: {
		  outer: {
			format: "label",
			hideWhenLessThanPercentage: null,
			pieDistance: 30
		  },
		  inner: {
			format: "percentage",
			hideWhenLessThanPercentage: null
		  },
		  mainLabel: {
			color: "#000",
			font: "arial",
			fontSize: 14
		  },
		  percentage: {
			color: "#dddddd",
			font: "arial",
			fontSize: 13,
			decimalPlaces: 0
		  },
		  value: {
			color: "#cccc44",
			font: "arial",
			fontSize: 18
		  },
		  lines: {
			enabled: true,
			style: "curved",
			color: "segment"
		  },
		  truncation: {
			enabled: false,
			length: 30
		  }
	},

	misc: {
  colors: {
    background: null,
		segments: [
		  "#c9233e", "#50f300","#7077bf", "#c246b2",  "#ff8a00", "#16d1f3", "#987ac6", "#3d3b87", "#b77b1c", "#c9c2b6",
		  "#807ece", "#8db27c", "#be66a2", "#9ed3c6", "#00644b", "#005064", "#77979f", "#77e079", "#9c73ab", "#1f79a7","#2484c1", "#65a620", "#7b6888", "#a05d56", "#961a1a", "#d8d23a", "#e98125", "#d0743c", "#635222", "#6ada6a",
		  "#0c6197", "#7d9058", "#207f33", "#44b9b0", "#bca44a", "#e4a14b", "#a3acb2", "#8cc3e9", "#69a6f9", "#5b388f"
		  
		],
		segmentStroke: "#ffffff"
	  },
	  gradient: {
		enabled: true,
		percentage: 95,
		color: "#000000"
	  },
	  canvasPadding: {
		top: 5,
		right: 5,
		bottom: 5,
		left: 5
	  },
	  pieCenterOffset: {
		x: 0,
		y: 0
	  },
	  cssPrefix: null
},
});
</script>

<!-- Schoolwise hits Graph -->
<script>
	var pie = new d3pie("schoolhit_pie", {
		header: {
			  title: {
				text:     "",
				color:    "#333333",
				fontSize: 18,
				font:     "arial"
			  },
			  subtitle: {
				text:     "",
				color:    "#666666",
				fontSize: 14,
				font:     "arial"
			  },
			  location: "top-center",
			  titleSubtitlePadding: 8
		},

		footer: {
			  text:     "School Wise Downloads",
			  color:    "#000",
			  fontSize: 25,
			  font:     "arial",
			  location: "bottom-center"
		},

		size: {
			  canvasHeight: 500,
			  canvasWidth: 550,
			  pieInnerRadius: "0%",
			  pieOuterRadius: null
		},

		data: {
			smallSegmentGrouping: {
			enabled: true,
			value: "Other",
			valueType: "percentage",
			label: "Other",
			color: "#cccccc"
		  },

			content: [
				<?php
						echo $schoolhit_data;
				?>
			]
		},
    tooltips: {
      enabled: true,
      type: "placeholder",
      string: "{label}: {percentage}%",
      styles: {
        fadeInSpeed: 500,
        backgroundColor: "#00cc99",
        backgroundOpacity: 0.8,
        color: "#ffffcc",
        borderRadius: 4,
        font: "verdana",
        fontSize: 6,
        padding: 10
      }
    },
	labels: {
		  outer: {
			format: "label",
			hideWhenLessThanPercentage: null,
			pieDistance: 30
		  },
		  inner: {
			format: "percentage",
			hideWhenLessThanPercentage: null
		  },
		  mainLabel: {
			color: "#000",
			font: "arial",
			fontSize: 14
		  },
		  percentage: {
			color: "#dddddd",
			font: "arial",
			fontSize: 13,
			decimalPlaces: 0
		  },
		  value: {
			color: "#cccc44",
			font: "arial",
			fontSize: 18
		  },
		  lines: {
			enabled: true,
			style: "curved",
			color: "segment"
		  },
		  truncation: {
			enabled: false,
			length: 30
		  }
	},

	misc: {
  colors: {
    background: null,
		segments: [
		  "#c9233e", "#50f300","#7077bf", "#c246b2",  "#ff8a00", "#16d1f3", "#987ac6", "#3d3b87", "#b77b1c", "#c9c2b6",
		  "#807ece", "#8db27c", "#be66a2", "#9ed3c6", "#00644b", "#005064", "#77979f", "#77e079", "#9c73ab", "#1f79a7","#2484c1", "#65a620", "#7b6888", "#a05d56", "#961a1a", "#d8d23a", "#e98125", "#d0743c", "#635222", "#6ada6a",
		  "#0c6197", "#7d9058", "#207f33", "#44b9b0", "#bca44a", "#e4a14b", "#a3acb2", "#8cc3e9", "#69a6f9", "#5b388f"
		  
		],
		segmentStroke: "#ffffff"
	  },
	  gradient: {
		enabled: true,
		percentage: 95,
		color: "#000000"
	  },
	  canvasPadding: {
		top: 5,
		right: 5,
		bottom: 5,
		left: 5
	  },
	  pieCenterOffset: {
		x: 0,
		y: 0
	  },
	  cssPrefix: null
},
});
</script>
<!-- Subjecthit Graph -->
<script>
	var pie = new d3pie("subjecthit_pie", {
		header: {
			  title: {
				text:     "",
				color:    "#333333",
				fontSize: 18,
				font:     "arial"
			  },
			  subtitle: {
				text:     "",
				color:    "#666666",
				fontSize: 14,
				font:     "arial"
			  },
			  location: "top-center",
			  titleSubtitlePadding: 8
		},

		footer: {
			  text:     "Subject Wise Downloads (Top 10)",
			  color:    "#000",
			  fontSize: 25,
			  font:     "arial",
			  location: "bottom-center"
		},

		size: {
			  canvasHeight: 500,
			  canvasWidth: 550,
			  pieInnerRadius: "0%",
			  pieOuterRadius: null
		},

		data: {
			smallSegmentGrouping: {
			enabled: true,
			value: "Other",
			valueType: "percentage",
			label: "Other",
			color: "#cccccc"
		  },

			content: [
				<?php
						echo $subjecthit_data;
				?>
			]
		},
    tooltips: {
      enabled: true,
      type: "placeholder",
      string: "{label}: {percentage}%",
      styles: {
        fadeInSpeed: 500,
        backgroundColor: "#00cc99",
        backgroundOpacity: 0.8,
        color: "#ffffcc",
        borderRadius: 4,
        font: "verdana",
        fontSize: 6,
        padding: 10
      }
    },
	labels: {
		  outer: {
			format: "label",
			hideWhenLessThanPercentage: null,
			pieDistance: 30
		  },
		  inner: {
			format: "percentage",
			hideWhenLessThanPercentage: null
		  },
		  mainLabel: {
			color: "#000",
			font: "arial",
			fontSize: 14
		  },
		  percentage: {
			color: "#dddddd",
			font: "arial",
			fontSize: 13,
			decimalPlaces: 0
		  },
		  value: {
			color: "#cccc44",
			font: "arial",
			fontSize: 18
		  },
		  lines: {
			enabled: true,
			style: "curved",
			color: "segment"
		  },
		  truncation: {
			enabled: false,
			length: 30
		  }
	},

	misc: {
  colors: {
    background: null,
		segments: [
		  "#c9233e", "#50f300","#7077bf", "#c246b2",  "#ff8a00", "#16d1f3", "#987ac6", "#3d3b87", "#b77b1c", "#c9c2b6",
		  "#807ece", "#8db27c", "#be66a2", "#9ed3c6", "#00644b", "#005064", "#77979f", "#77e079", "#9c73ab", "#1f79a7","#2484c1", "#65a620", "#7b6888", "#a05d56", "#961a1a", "#d8d23a", "#e98125", "#d0743c", "#635222", "#6ada6a",
		  "#0c6197", "#7d9058", "#207f33", "#44b9b0", "#bca44a", "#e4a14b", "#a3acb2", "#8cc3e9", "#69a6f9", "#5b388f"
		  
		],
		segmentStroke: "#ffffff"
	  },
	  gradient: {
		enabled: true,
		percentage: 95,
		color: "#000000"
	  },
	  canvasPadding: {
		top: 5,
		right: 5,
		bottom: 5,
		left: 5
	  },
	  pieCenterOffset: {
		x: 0,
		y: 0
	  },
	  cssPrefix: null
},
});
</script>
<!-- recbyhit Graph -->
<script>
	var pie = new d3pie("recbyhit_pie", {
		header: {
			  title: {
				text:     "",
				color:    "#333333",
				fontSize: 18,
				font:     "arial"
			  },
			  subtitle: {
				text:     "",
				color:    "#666666",
				fontSize: 14,
				font:     "arial"
			  },
			  location: "top-center",
			  titleSubtitlePadding: 8
		},

		footer: {
			  text:     "Recommended By Wise Downloads",
			  color:    "#000",
			  fontSize: 25,
			  font:     "arial",
			  location: "bottom-center"
		},

		size: {
			  canvasHeight: 500,
			  canvasWidth: 550,
			  pieInnerRadius: "0%",
			  pieOuterRadius: null
		},

		data: {
			smallSegmentGrouping: {
			enabled: true,
			value: "Other",
			valueType: "percentage",
			label: "Other",
			color: "#cccccc"
		  },

			content: [
				<?php
						echo $recbyhit_data;
				?>
			]
		},
    tooltips: {
      enabled: true,
      type: "placeholder",
      string: "{label}: {percentage}%",
      styles: {
        fadeInSpeed: 500,
        backgroundColor: "#00cc99",
        backgroundOpacity: 0.8,
        color: "#ffffcc",
        borderRadius: 4,
        font: "verdana",
        fontSize: 6,
        padding: 10
      }
    },
	labels: {
		  outer: {
			format: "label",
			hideWhenLessThanPercentage: null,
			pieDistance: 30
		  },
		  inner: {
			format: "percentage",
			hideWhenLessThanPercentage: null
		  },
		  mainLabel: {
			color: "#000",
			font: "arial",
			fontSize: 14
		  },
		  percentage: {
			color: "#dddddd",
			font: "arial",
			fontSize: 13,
			decimalPlaces: 0
		  },
		  value: {
			color: "#cccc44",
			font: "arial",
			fontSize: 18
		  },
		  lines: {
			enabled: true,
			style: "curved",
			color: "segment"
		  },
		  truncation: {
			enabled: false,
			length: 30
		  }
	},

	misc: {
  colors: {
    background: null,
		segments: [
		  "#c9233e", "#50f300","#7077bf", "#c246b2",  "#ff8a00", "#16d1f3", "#987ac6", "#3d3b87", "#b77b1c", "#c9c2b6",
		  "#807ece", "#8db27c", "#be66a2", "#9ed3c6", "#00644b", "#005064", "#77979f", "#77e079", "#9c73ab", "#1f79a7","#2484c1", "#65a620", "#7b6888", "#a05d56", "#961a1a", "#d8d23a", "#e98125", "#d0743c", "#635222", "#6ada6a",
		  "#0c6197", "#7d9058", "#207f33", "#44b9b0", "#bca44a", "#e4a14b", "#a3acb2", "#8cc3e9", "#69a6f9", "#5b388f"
		  
		],
		segmentStroke: "#ffffff"
	  },
	  gradient: {
		enabled: true,
		percentage: 95,
		color: "#000000"
	  },
	  canvasPadding: {
		top: 5,
		right: 5,
		bottom: 5,
		left: 5
	  },
	  pieCenterOffset: {
		x: 0,
		y: 0
	  },
	  cssPrefix: null
},
});
</script>
