const queryString = require('querystring');
const loaderUtils = require('loader-utils');
const path = require('path');

module.exports = function (source) {
  const query = queryString.parse(this.resourceQuery);
  const options = loaderUtils.getOptions(this);
  const fileName = `${query.name}.${query.ext}`;
  const uri = loaderUtils.interpolateName(this, fileName, {
    context: options.context || this.rootContext,
    content: source
  });

  const outputPath = path.posix.join(options.outputPath, uri);
  this.emitFile(outputPath, source.trim());

  return `module.exports = function (c) { c.content = __webpack_public_path__ + ${JSON.stringify(outputPath)}; }`;
};
