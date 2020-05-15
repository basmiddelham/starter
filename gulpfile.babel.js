import yargs from 'yargs';
const PRODUCTION = yargs.argv.prod;

export const hello = (cb) => {
  console.log(PRODUCTION);
  cb();
}

export const promise = (cb) => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve();
    }, 300);
  });
};

export default hello