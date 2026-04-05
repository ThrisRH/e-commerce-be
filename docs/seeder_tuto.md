You are a senior Laravel developer working on an existing Porto architecture project.

IMPORTANT:
- First, read the current project structure (Models, relationships, namespaces).
- Detect:
  - Product model
  - Category model
  - Attribute model
  - ProductAttributeValue (or equivalent table)
- Reuse existing relationships (DO NOT reinvent schema).

---

## CURRENT SYSTEM

- Categories exist (with parent-child)
- Attributes exist and are mapped to categories via `category_attributes`
- Each category defines which attributes a product must have
- You must create products with attribute values following category attributes

---

## TASK

Create a ProductSeeder that:

### 1. For EACH category:
- laptop-officeworks
- laptop-gaming
- cpu
- gpu
- ram
- hdd
- ssd
- mainboard
- psu
- monitor

👉 Create AT LEAST **3 products per category**

---

### 2. Each product must:
- have realistic name (real-world product)
- belong to correct category
- include FULL attribute values based on that category

---

### 3. If an attribute is missing in AttributeSeeder:
👉 CREATE it automatically before using

Examples of missing attributes you may need to create:

#### Laptop
- battery
- gpu-model
- weight (already exists maybe)
- screen-type

#### CPU
- cpu-model
- integrated-gpu

#### GPU
- gpu-brand
- gpu-model
- gpu-boost-clock
- power-consumption

---

### 4. Attribute values must be REALISTIC

Example:

#### CPU (Intel Core i9-14900K)
- cpu-series: i9
- cpu-model: 14900K
- cpu-cores: 24
- cpu-threads: 32
- base-clock: 3.2
- boost-clock: 6.0
- cpu-socket: LGA1700
- tdp: 125

#### GPU (RTX 4090)
- gpu-chipset: NVIDIA RTX 4090
- vram-capacity: 24
- vram-type: GDDR6X

#### Laptop Gaming
- cpu-series: i7
- ram-capacity: 16
- storage-capacity: 1024
- gpu-chipset: RTX 4060
- refresh-rate: 144

---