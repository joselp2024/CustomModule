resource "aws_iam_policy" "can_get_db_password" {
  name        = "can-get-db-password"
  path        = "/"
  description = "Allow access to retrieve secrets from Secrets Manager"

  policy = jsonencode({
    Version : "2012-10-17",
    Statement : [
      {
        Effect : "Allow",
        Action : [
          "secretsmanager:GetSecretValue"
        ],
        Resource : [
          "arn:aws:secretsmanager:us-east-2:122610498498:secret:rds!db-53bf7b83-aa1b-4619-992f-45846da3917e-XAhSEQ"
        ]
      }
    ]
  })
}

output "can_get_db_password_arn" {
  value = aws_iam_policy.can_get_db_password.arn
}