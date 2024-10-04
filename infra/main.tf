terraform {
  backend "s3" {
    bucket = "terraform-bucket-proinnova"
    key    = "terraform.tfstate"
    region = "us-east-2"
  }
}

provider "aws" {
  region = "us-east-2"
}

module "iam" {
  source = "./iam"
}

module "s3" {
  source = "./s3"
}


module "compute" {
  source                  = "./compute"
  lambda_bucket           = module.s3.lambda_bucket
  repo_collector_role_arn = module.iam.repo_collector_role_arn
  subnet_ids              = ["subnet-0542db53f30163d35", "subnet-0f22fc299e3e6c454", "subnet-02b471ba93dbe473e"]
}