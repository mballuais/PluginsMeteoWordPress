(function (blocks, element, blockEditor) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var useBlockProps = blockEditor.useBlockProps;
  var TextControl = blockEditor.TextControl;

  registerBlockType("plugin-meteo/meteo", {
    title: "Widget Météo",
    icon: "cloud",
    category: "widgets",
    attributes: {
      city: {
        type: "string",
        default: "Paris",
      },
    },
    edit: function (props) {
      return el(
        "div",
        useBlockProps(),
        el(TextControl, {
          label: "Ville",
          value: props.attributes.city,
          onChange: function (newValue) {
            props.setAttributes({ city: newValue });
          },
          placeholder: "Entrez le nom de la ville",
        })
      );
    },
    save: function () {
      // Le rendu est effectué côté serveur via PHP
      return null;
    },
  });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor);
