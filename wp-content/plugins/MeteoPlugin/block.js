(function (blocks, element, blockEditor) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var useBlockProps = blockEditor.useBlockProps;

  registerBlockType("plugin-meteo/meteo", {
    title: "Widget Météo",
    icon: "cloud",
    category: "widgets",
    edit: function () {
      return el(
        "div",
        useBlockProps(),
        "Le formulaire de recherche de la météo apparaîtra ici sur le site."
      );
    },
    save: function () {
      return null;
    },
  });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor);
